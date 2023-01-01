<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Category;
use Illuminate\Http\Request;

class blogsController extends Controller
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
        $blogs = Blogs::with('cat')->get();

        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('admin.blogs.create',compact('category'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crud = new Blogs;
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/blogs', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->category = $request->category;
        // $crud->specialization = $request->specialization;
        $crud->save();

        return redirect(route('blogs.index'))->with('success','Successfully Added');
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
        $blog = Blogs::findorfail($id);
        $category = Category::get();
        return view('admin.blogs.edit',compact('blog','category'));
       
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
        $crud = Blogs::findorfail($id);
        if($request->file('uploads') != NULL){
            // $this->validate($request,['uploads'  => 'mimes:jpeg,png|max:1024']);
            // $fileName = time().'_'.$ticket_id.'.'.$request->file('uploads')->extension();
        $fileName = time().'_'.$request->file('uploads')->getClientOriginalName();
        $filePath = $request->file('uploads')->storeAs('uploads/blogs', $fileName, 'public');
        $crud->image = $filePath;
        }
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->category = $request->category;
        // $crud->specialization = $request->specialization;
        $crud->save();

        return redirect()->route('blogs.index')->with('status','Successfully Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = Blogs::findorfail($id);
        $crud->delete();

        return back()->with('status','Successfully Deleted');
    }
}
