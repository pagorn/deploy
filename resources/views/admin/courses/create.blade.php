@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col">
                <div class="card">
                    <div class="card-header">Create New course</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/courses') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/courses') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                          

                            <label for="department_id" class="control-label">{{ 'รหัสสาขาวิชา' }}</label>
<div class="form-group">
           
            <select class="form-control" id="department_id" name="department_id">
            @foreach($department as $item)
                        <option value="{{$item->department_id}}">{{$item->department_name}}</option>
                    @endforeach
            </select>
        </div>

<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    <label for="course_id" class="control-label">{{ 'รหัสหลักสูตร' }}</label>
    <input class="form-control" name="course_id" type="text" id="course_id" value="{{ isset($courses->course_id) ? $courses->course_id : ''}}" >
    {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
    <label for="course_name" class="control-label">{{ 'ชื่อหลักสูตร' }}</label>
    <input class="form-control" name="course_name" type="text" id="course_name" value="{{ isset($courses->course_name) ? $courses->course_name : ''}}" >
    {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" >
</div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection