<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class servicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::get();

        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = new Services;
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/services', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->title = $request->title;
        $crud->description = $request->description;
        // $crud->category = $request->category;
        // $crud->specialization = $request->specialization;
        $crud->save();

        return redirect(route('services.index'))->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Services::findorfail($id);

        return view('admin.services.edit',compact('service'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $crud = Services::findorfail($id);
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/services', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->title = $request->title;
        $crud->description = $request->description;
        // $crud->category = $request->category;
        // $crud->specialization = $request->specialization;
        $crud->save();

        return redirect()->route('services.index')->with('status','Successfully Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = Services::findorfail($id);
        $crud->delete();

        return back()->with('status','Successfully Deleted');
    }
}
