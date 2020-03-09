<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\report;
use App\grade;
use App\user;
use App\course;
use App\course_detail;
use App\manage_course;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class reportController1 extends Controller
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
            $report = report::where('student_id', 'LIKE', "$keyword")
 

               
           
            
                ->orderby('gpax','desc')->paginate($perPage);
        } 
        
   
        
        else {
            $report = report::orderby('gpax','desc')->paginate($perPage);
        }


       $grade = grade::all();
       
       
       
       $courses = course::latest()->paginate(100);
   
        
    
        return view('report', compact('courses','report','grade'));
    }

    public function reportapprove(Request $request)
    {
        $keyword = $request->get('search');
        $keyword1 = $request->get('search1');
        $keyword2 = $request->get('search2');
        $perPage = 25;

        if (!empty($keyword)) {
            $report = report::where('course_name', 'LIKE', "$keyword")
 
                ->Where('status', 'LIKE', "$keyword1")
                ->Where('gpax', '>', "$keyword2")
               
           
            
                ->orderby('gpax','desc')->paginate($perPage);
        } 
        
   
        
        else {
            $report = report::orderby('gpax','desc')->paginate($perPage);
        }

        $courses = course::latest()->paginate(100);

        return view('reportapprove', compact('report','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        
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
        
        $count_credit_6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->Where('grade1', '>' ,'0')->sum('subject_credit');


        $gpa_credit_1 = grade::where('student_id', '=', $student_id)->Where('group_id', '101')->avg('grade1');
        $gpa_credit_2 = grade::where('student_id', '=', $student_id)->Where('group_id', '102')->avg('grade1');
        $gpa_credit_3 = grade::where('student_id', '=', $student_id)->Where('group_id', '103')->avg('grade1');

        $gpa_credit_4 = grade::where('student_id', '=', $student_id)->Where('group_id', '201')->avg('grade1');
        
        $gpa_credit_6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->avg('grade1');
        $gpa_credit_7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->avg('grade1');
        $gpa_credit_8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->avg('grade1');
        
        

            $manage_course = manage_course::latest()->paginate($perPage);
            $report = report::latest()->paginate($perPage);
        
            $keyword = $request->get('search');
      


    

        return view('admin.report.create', compact('report','count_credit_8','gpa_credit_8','grade_7','grade_4','grade_5','grade_6','gpa_credit_1','gpa_credit_2','gpa_credit_3','gpa_credit_4','gpa_credit_6','gpa_credit_7','count_credit_7','count_credit_6','count_credit_4','count_credit_3','count_credit_2','count_credit_1','sum_gpa_1','sum_category','sum_group','course_detail','sum_credit','manage_course','sum_gpa','gpa_2','gpa_3','gpa_1','grade','grade_2','grade_3','count_1','count_2','count_3'));
    }

    public function edit($id)
    {
        $report = report::findOrFail($id);

        $perPage = 25;

        $student_id = Auth::user()->student_id;
        $course_id = Auth::user()->course_id;

       $course_detail = course_detail::latest()->paginate(1);

       $manage_course = manage_course::latest()->paginate($perPage);

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
        
        $count_credit_6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->Where('grade1', '>' ,'0')->sum('subject_credit');


        $gpa_credit_1 = grade::where('student_id', '=', $student_id)->Where('group_id', '101')->avg('grade1');
        $gpa_credit_2 = grade::where('student_id', '=', $student_id)->Where('group_id', '102')->avg('grade1');
        $gpa_credit_3 = grade::where('student_id', '=', $student_id)->Where('group_id', '103')->avg('grade1');

        $gpa_credit_4 = grade::where('student_id', '=', $student_id)->Where('group_id', '201')->avg('grade1');
        
        $gpa_credit_6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->avg('grade1');
        $gpa_credit_7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->avg('grade1');
        $gpa_credit_8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->avg('grade1');
        
        $user = user::where('student_id', '=', $student_id)->latest()->paginate($perPage);
        $credit_sum = course_detail::where('course_id','=', $course_id)->pluck('sum_credit_coures')->first();

        $credit1 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '1')->pluck('sum_credit_group')->first();
        $credit2 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '2')->pluck('sum_credit_group')->first();
        $credit3 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '3')->pluck('sum_credit_group')->first();

        $credit4 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '1')->where('group_id','=', '101')->pluck('sum_credit_category')->first();
        $credit5 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '1')->where('group_id','=', '102')->pluck('sum_credit_category')->first();
        $credit6 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '1')->where('group_id','=', '103')->pluck('sum_credit_category')->first();

        $credit7 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '2')->where('group_id','=', '201')->pluck('sum_credit_category')->first();
        $credit8 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '2')->where('group_id','=', '202')->pluck('sum_credit_category')->first();
        $credit9 = course_detail::where('course_id','=', $course_id)->where('category_id','=', '2')->where('group_id','=', '203')->pluck('sum_credit_category')->first();

        
        $edit_id = report::where('student_id',  $student_id)->value('id');

        $count_credit_sum1 = grade::where('student_id', '=', $student_id)->Where('group_id', '101')->sum('subject_credit');
        $count_credit_sum2 = grade::where('student_id', '=', $student_id)->Where('group_id', '102')->sum('subject_credit');
        $count_credit_sum3 = grade::where('student_id', '=', $student_id)->Where('group_id', '103')->sum('subject_credit');
        $count_credit_sum4 = grade::where('student_id', '=', $student_id)->Where('group_id', '201')->sum('subject_credit');
        
        $count_credit_sum6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->sum('subject_credit');
        $count_credit_sum7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->sum('subject_credit');
        $count_credit_sum8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->sum('subject_credit');


        return view('admin.edit1', compact('user','count_credit_sum8','count_credit_sum7','count_credit_sum6','count_credit_sum4','count_credit_sum3','count_credit_sum2','count_credit_sum1','edit_id','student_id','report','credit_sum','credit9','credit8','credit7','credit6','credit5','credit4','credit3','credit2','credit1','count_credit_8','gpa_credit_8','grade_7','grade_4','grade_5','grade_6','gpa_credit_1','gpa_credit_2','gpa_credit_3','gpa_credit_4','gpa_credit_6','gpa_credit_7','count_credit_7','count_credit_6','count_credit_4','count_credit_3','count_credit_2','count_credit_1','sum_gpa_1','sum_category','sum_group','course_detail','sum_credit','manage_course','sum_gpa','gpa_2','gpa_3','gpa_1','grade','grade_2','grade_3','count_1','count_2','count_3'));
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
        
        report::create($requestData);

        return redirect('admin/grade')->with('flash_message', 'report added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {

        
       
        $keyword = $request->get('search');
        $perPage = 25;

        

   

            
        $student_id = report::where('id', '=', $keyword)->pluck('student_id');

   
        $course_id = Auth::user()->course_id;

       $course_detail = course_detail::latest()->paginate(1);

       
       if (!empty($keyword)) {
        
        $report = report::where('id', '=', $keyword)
   
            ->latest()->paginate(1);
           
        } else {

        $report = report::latest()->paginate(1);
     
        }


      


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
        
        $count_credit_6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->Where('grade1', '>' ,'0')->sum('subject_credit');
        $count_credit_8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->Where('grade1', '>' ,'0')->sum('subject_credit');


        $gpa_credit_1 = grade::where('student_id', '=', $student_id)->Where('group_id', '101')->avg('grade1');
        $gpa_credit_2 = grade::where('student_id', '=', $student_id)->Where('group_id', '102')->avg('grade1');
        $gpa_credit_3 = grade::where('student_id', '=', $student_id)->Where('group_id', '103')->avg('grade1');

        $gpa_credit_4 = grade::where('student_id', '=', $student_id)->Where('group_id', '201')->avg('grade1');
        
        $gpa_credit_6 = grade::where('student_id', '=', $student_id)->Where('group_id', '202')->avg('grade1');
        $gpa_credit_7 = grade::where('student_id', '=', $student_id)->Where('group_id', '203')->avg('grade1');
        $gpa_credit_8 = grade::where('student_id', '=', $student_id)->Where('group_id', '204')->avg('grade1');
        
        

            $manage_course = manage_course::latest()->paginate($perPage);

      
         

        return view('admin.report.show', compact('student_id','keyword','report','count_credit_8','gpa_credit_8','grade_7','grade_4','grade_5','grade_6','gpa_credit_1','gpa_credit_2','gpa_credit_3','gpa_credit_4','gpa_credit_6','gpa_credit_7','count_credit_7','count_credit_6','count_credit_4','count_credit_3','count_credit_2','count_credit_1','sum_gpa_1','sum_category','sum_group','course_detail','sum_credit','manage_course','sum_gpa','gpa_2','gpa_3','gpa_1','grade','grade_2','grade_3','count_1','count_2','count_3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
  

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
        
        $report = report::findOrFail($id);
        $report->update($requestData);

        return redirect('admin/grade')->with('flash_message', 'report updated!');
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
        report::destroy($id);

        return redirect('admin/report')->with('flash_message', 'report deleted!');
    }
}
