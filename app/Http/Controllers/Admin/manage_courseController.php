<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\manage_course;
use App\course_detail;
use App\course;
use App\subcategory;
use App\subgroup;
use App\department;
use Illuminate\Http\Request;

class manage_courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(Request $request)
    {
    
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $manage_course = manage_course::where('subject_id', 'LIKE', "%$keyword%")
                ->orWhere('subject_name', 'LIKE', "%$keyword%")
                ->orWhere('course_id', 'LIKE', "%$keyword%")
                ->orWhere('course_name', 'LIKE', "$keyword")
                ->latest()->paginate($perPage);

                
        } else {
            


        $manage_course = manage_course::latest()->paginate($perPage);


        }
       // $manage_course = manage_course::latest();
        $course_detail = course_detail::latest()->paginate($perPage);


        return view('admin.manage_course.index', compact('manage_course','course_detail'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $department = department::latest()->paginate(100);
        $courses = course::latest()->paginate(100);
        $subcategory = subcategory::latest()->paginate(100);
        $subgroup = subgroup::latest()->paginate(100);
        return view('admin.manage_course.create', compact('department','courses','subcategory','subgroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        manage_course::create($requestData);

        return redirect('admin/manage_course')->with('flash_message', 'manage_course added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $manage_course = manage_course::findOrFail($id);

        return view('admin.manage_course.show', compact('manage_course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $manage_course = manage_course::findOrFail($id);
        $department = department::latest()->paginate(100);
        $courses = course::latest()->paginate(100);
        $subcategory = subcategory::latest()->paginate(100);
        $subgroup = subgroup::latest()->paginate(100);

        return view('admin.manage_course.edit', compact('manage_course','department','courses','subcategory','subgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $manage_course = manage_course::findOrFail($id);
        $manage_course->update($requestData);

        return redirect('admin/manage_course')->with('flash_message', 'manage_course updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        manage_course::destroy($id);

        return redirect('admin/manage_course')->with('flash_message', 'manage_course deleted!');
    }
}
