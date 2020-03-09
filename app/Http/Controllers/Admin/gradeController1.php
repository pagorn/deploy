<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\grade;
use App\user;
use App\report;
use App\manage_course;
use App\course_detail;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class gradeController1 extends Controller
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

        $student_id = Auth::user()->student_id;
        $course_id = Auth::user()->course_id;

       $course_detail = course_detail::latest()->paginate(1);

       

        $sum_group = grade::where('student_id', '=', $student_id)->Where('group_id', '101')->sum('subject_credit');

        $sum_category = grade::where('student_id', '=', $student_id)->Where('category_id', '1')->sum('subject_credit');

        $count_1 = grade::where('student_id', '=', $student_id)->Where('category_id', '1')->sum('subject_credit');
        $count_2 = grade::where('student_id', '=', $student_id)->Where('category_id', '2')->sum('subject_credit');
        $count_3 = grade::where('student_id', '=', $student_id)->Where('category_id', '3')->sum('subject_credit');

        $gpa_1 = grade::where('student_id', '=', $student_id)->Where('category_id', '1')->avg('grade1');
        $gpa_2 = grade::where('student_id', '=', $student_id)->Where('category_id', '2')->avg('grade1');
        $gpa_3 = grade::where('student_id', '=', $student_id)->Where('category_id', '3')->avg('grade1');

        $sum_gpa = grade::where('student_id', '=', $student_id)->avg('grade1');

        $sum_gpa_1 = grade::where('student_id', '=', $student_id)->Where('category_id', '2')->avg('grade1');

        $sum_credit = $count_1+$count_2+$count_3;
  

        $grade = grade::where('student_id', '=', $student_id)->Where('group_id', "101")->paginate($perPage);
        $grade_2 = grade::where('student_id', '=', $student_id)->Where('group_id', "102")->paginate($perPage);
        $grade_3 = grade::where('student_id', '=', $student_id)->Where('group_id', "103")->paginate($perPage);

        $grade_4= grade::where('student_id', '=', $student_id)->Where('group_id', "201")->paginate($perPage);
        $grade_5 = grade::where('student_id', '=', $student_id)->Where('group_id', "202")->paginate($perPage);
        $grade_6 = grade::where('student_id', '=', $student_id)->Where('group_id', "203")->paginate($perPage);
        $grade_7 = grade::where('student_id', '=', $student_id)->Where('group_id', "204")->paginate($perPage);

        $count_credit_1 = grade::where('student_id', '=', $student_id)->Where('group_id', '101')->Where('grade1', '>' ,'0')->sum('subject_credit');
        
       

        
   
        
        
    
        $count_credit_2 = grade::where('student_id', '=', $student_id)->Where('group_id', '102')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_3 = grade::where('student_id', '=', $student_id)->Where('group_id', '103')->Where('grade1', '>' ,'0')->sum('subject_credit');

        $count_credit_4 = grade::where('student_id', '=', $student_id)->Where('group_id', '201')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_5 = grade::where('student_id', '=', $student_id)->Where('group_id', '20')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->Where('grade1', '>' ,'0')->sum('subject_credit');


        $gpa_credit_1 = grade::where('student_id', '=', $student_id)->Where('group_id', '101')->where('grade1','>',0)->avg('grade1');
        $gpa_credit_2 = grade::where('student_id', '=', $student_id)->Where('group_id', '102')->where('grade1','>',0)->avg('grade1');
        $gpa_credit_3 = grade::where('student_id', '=', $student_id)->Where('group_id', '103')->where('grade1','>',0)->avg('grade1');

        $gpa_credit_4 = grade::where('student_id', '=', $student_id)->Where('group_id', '201')->where('grade1','>',0)->avg('grade1');
        
        $gpa_credit_6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->where('grade1','>',0)->avg('grade1');
        $gpa_credit_7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->where('grade1','>',0)->avg('grade1');
        $gpa_credit_8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->where('grade1','>',0)->avg('grade1');


        $keyword = $request->get('search');
        $perPage = 1;

        if (!empty($keyword)) {
            $manage_course = manage_course::where('subject_id', $keyword)->first();

        } else {

            $manage_course = manage_course::latest()->paginate($perPage);
        }

        $manage_course = manage_course::latest()->paginate($perPage);
        
        return view('admin.grade1.index', compact('count_credit_8','gpa_credit_8','grade_7','grade_4','grade_5','grade_6','gpa_credit_1','gpa_credit_2','gpa_credit_3','gpa_credit_4','gpa_credit_6','gpa_credit_7','count_credit_7','count_credit_6','count_credit_5','count_credit_4','count_credit_3','count_credit_2','count_credit_1','sum_gpa_1','sum_category','sum_group','course_detail','sum_credit','manage_course','sum_gpa','gpa_2','gpa_3','gpa_1','grade','grade_2','grade_3','count_1','count_2','count_3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */


    public function create(Request $request)
    {
        $keyword = $request->get('search');
      

        if (!empty($keyword)) {
            $manage_course = manage_course::where('subject_id', 'LIKE', "%$keyword%")
                ->orWhere('subject_name', 'LIKE', "%$keyword%")
                ->orWhere('group_name', 'LIKE', "%$keyword%")
                ->latest()->paginate(1);

            } else {

            $manage_course = manage_course::latest()->paginate(1);
       
            }
        return view('admin.create1' ,compact('manage_course'));
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
        
        grade::create($requestData);

        return redirect('admin/grade1/create')->with('flash_message', 'grade added!');
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
        $grade = grade::findOrFail($id);

        return view('admin.grade1.show', compact('grade'));
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
        $grade = grade::findOrFail($id);

        return view('admin.grade1.edit', compact('grade'));
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
        
        $grade = grade::findOrFail($id);
        $grade->update($requestData);

        return redirect('admin/report')->with('flash_message', 'grade updated!');
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
        grade::destroy($id);
   
      
  
        return redirect('admin/report/')->with('flash_message', 'grade deleted!');
    }
}
