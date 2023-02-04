<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        $slider_data = Slider::get();
        return view('admin.slider.index',compact('slider_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = New Slider();
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/slider', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->save();

        return redirect()->route('slider.index')->with('success','Successfully Added');
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
        $slider_data = Slider::findorfail($id);

        return view('admin.slider.edit',compact('slider_data'));
        
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
        $crud = Slider::findorfail($id);
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/slider', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->save();

        return redirect()->route('slider.index')->with('success','Successfully Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = Slider::findorfail($id);
        $crud->delete();
        return back()->with('status','Successfully Deleted');
        
    }
}
