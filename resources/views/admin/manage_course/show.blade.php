@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
       

            <div class="col">
                <div class="card">
                    <div class="card-header">manage_course {{ $manage_course->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/manage_course') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/manage_course/' . $manage_course->id . '/edit') }}" title="Edit manage_course"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/manage_course' . '/' . $manage_course->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete manage_course" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>รหัสสาขาวิชา</th><td>{{ $manage_course->department_id }}</td>
                                    </tr>
                                    <tr><th> ชื่อสาขาวิชา </th><td> {{ $manage_course->department_name }} </td></tr>
                                    <tr><th> รหัสหลักสูตร </th><td> {{ $manage_course->course_id }} </td></tr>
                                    <tr><th> ชื่อหลักสูตร </th><td> {{ $manage_course->course_name }} </td></tr>
                                    <tr><th> รหัสรายวิชา </th><td> {{ $manage_course->subject_id }} </td></tr>
                                    <tr><th> ชื่อรายวิชา </th><td> {{ $manage_course->subject_name }} </td></tr>
                                    <tr><th> หน่วยกิต </th><td> {{ $manage_course->subject_credit }} </td></tr>
                                    <tr><th> รหัสหมวดวิชา </th><td> {{ $manage_course->category_id }} </td></tr>
                                    <tr><th> ชื่อหมวดวิชา </th><td> {{ $manage_course->category_name }} </td></tr>
                                    <tr><th> รหัสกลุ่มวิชา </th><td> {{ $manage_course->group_id }} </td></tr>
                                    <tr><th> ชื่อกลุ่มวิชา </th><td> {{ $manage_course->group_name }} </td></tr>
                                    <tr><th> คำนวณเกรดเฉลี่ยรายวิชาเฉพาะ </th><td> {{ $manage_course->condition_gpa }} </td></tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
