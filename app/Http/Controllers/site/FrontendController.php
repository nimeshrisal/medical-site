<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\Doctors;
use App\Models\Feedback;
use App\Models\Services;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function getDepWiseDoc(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $data = getDeptWiseDoc($id);
            return response()->json(['doc'=>$data],200);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $services = Services::get();
       
        return view('site.home',compact('services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        try {
            $crud = new Appointments;
            $crud->date = $request->date;
            $crud->department = $request->department;
            $crud->doctor_id = $request->doctor;
            $crud->name = $request->name;
            $crud->phone_no = $request->phone_no;
            $crud->email = $request->email;
            $crud->save();

            return redirect()->route('/')->with('status','Successfully Added');
            
        } catch (\Throwable $th) {

            return redirect()->route('/')->with('status','Error');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function service()
    {
        $services = Services::get();
        return view('site.department',compact('services'));
    }
    public function serviceDetail($id)
    {
        $service = Services::findorfail($id);

        return view('site.detailService',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blogs()
    {
        $blogs = Blogs::with('cat')->get();
        $category = Category::get();
        // dd($blogs);
        return view('site.blog',compact('blogs','category'));
    }

    public function blogDetail($id)
    {
        $blog = Blogs::with('cat')->findorfail($id);
        
        // dd($blogs);
        return view('site.singleblog',compact('blog'));
    }
    public function doc()
    {
        $doctors = Doctors::with('service')->get();
        // $category = Category::get();
        // dd($blogs);
        return view('site.doctors',compact('doctors'));
    }

    public function docDetail($id)
    {
        $doc = Doctors::with('service')->findorfail($id);
        return view('site.doctordetail',compact('doc'));
    }
    public function contactDetail()
    {
        $contact = Contacts::get()->last();
        return view('site.contact',compact('contact'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function feedback(Request $request)
    {
        try {
            $crud = new Feedback;
    
            $crud->name = $request->name;
            $crud->feedback = $request->message;
            $crud->email = $request->email;
            $crud->subject = $request->subject;
            $crud->save();
            return back()->with('status','Email Sent Successfully!');
            
        } catch (\Throwable $th) {
            return back()->with('error','fields cant be empty');
        }

    }
}
