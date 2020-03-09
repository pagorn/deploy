<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\course;
use App\department;
use Illuminate\Http\Request;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $courses = course::where('course_name', 'LIKE', "$keyword")
             
      
                ->latest()->paginate($perPage);
        } else {
            $courses = course::latest()->paginate($perPage);
        }

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $department = department::latest()->paginate(10);
        return view('admin.courses.create', compact('department'));
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
        
        course::create($requestData);

        return redirect('admin/courses')->with('flash_message', 'course added!');
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
        $course = course::findOrFail($id);

        return view('admin.courses.show', compact('course'));
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
        $perPage=25;
        $course = course::findOrFail($id);
        $department = department::latest()->paginate(10);
       // $courses = course::latest()->paginate($perPage);

        return view('admin.courses.edit', compact('courses','course','department'));
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
        
        $course = course::findOrFail($id);
        $course->update($requestData);

        return redirect('admin/courses')->with('flash_message', 'course updated!');
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
        course::destroy($id);

        return redirect('admin/courses')->with('flash_message', 'course deleted!');
    }
}
