<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
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
        $testimonials = Testimonial::get();
        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = New Testimonial();
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/testimonials', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->testimonial = $request->description;
        $crud->clients_name = $request->name;
        $crud->save();

        return redirect()->route('testimonial.index')->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findorfail($id);
        return view('admin.testimonials.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $crud = Testimonial::findorfail($id);
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/testimonials', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->testimonial = $request->description;
        $crud->clients_name = $request->name;
        $crud->save();

        return redirect()->route('testimonial.index')->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = Testimonial::findorfail($id);
        $crud->delete();
        return redirect()->route('testimonial.index')->with('success','Successfully Deleted');

        
    }
}
