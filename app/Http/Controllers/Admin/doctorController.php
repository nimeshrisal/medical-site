<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use App\Models\Services;
use Illuminate\Http\Request;

class doctorController extends Controller
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
        $doctors = Doctors::with('service')->get();
        // dd($doctors);
        return view('admin.doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Services::get();
        return view('admin.doctors.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = new Doctors;
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/doctor', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->name = $request->name;
        $crud->description = $request->description;
        $crud->department = $request->department;
        $crud->specialization = $request->specialization;
        $crud->save();

        return redirect(route('doctors.index'))->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('site.doctors');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctors::with('service')->findorfail($id);
        $services = Services::get();
        return view('admin.doctors.edit',compact('doctor','services'));
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

        $crud = Doctors::findorfail($id);
        // $filePath = '';
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/doctor', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->name = $request->name;
        $crud->description = $request->description;
        $crud->department = $request->department;
        $crud->specialization = $request->specialization;
        $crud->save();

        return redirect()->route('doctors.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = Doctors::findorfail($id);
        $crud->delete();

        return back()->with('status','Destroyed');
    }
}
