<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\course_detail;
use App\course;
use App\subcategory;
use App\subgroup;
use App\department;
use Illuminate\Http\Request;
use DB;

class course_detailController extends Controller
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
            $course_detail = course_detail::where('course_id', 'LIKE', "$keyword")

                ->latest()->paginate($perPage);
        } else {
            $course_detail = course_detail::latest()->paginate($perPage);
        }

        $course_detail1 = DB::table('course_details')
        ->select('course_id')
        ->distinct()
        ->get();
        return view('admin.course_detail.index', compact('course_detail','course_detail1'));
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
        return view('admin.course_detail.create', compact('department','courses','subcategory','subgroup'));
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
        
        course_detail::create($requestData);

        return redirect('admin/course_detail/create')->with('flash_message', 'course_detail added!');
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
        $course_detail = course_detail::findOrFail($id);

        return view('admin.course_detail.show', compact('course_detail'));
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
        $course_detail = course_detail::findOrFail($id);
        $department = department::latest()->paginate(100);
        $courses = course::latest()->paginate(100);
        $subcategory = subcategory::latest()->paginate(100);
        $subgroup = subgroup::latest()->paginate(100);

        return view('admin.course_detail.edit', compact('course_detail','department','courses','subcategory','subgroup'));
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
        
        $course_detail = course_detail::findOrFail($id);
        $course_detail->update($requestData);

        return redirect('admin/course_detail')->with('flash_message', 'course_detail updated!');
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
        course_detail::destroy($id);

        return redirect('admin/course_detail')->with('flash_message', 'course_detail deleted!');
    }
}
