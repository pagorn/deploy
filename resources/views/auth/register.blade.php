@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ-สกุล') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_id" class="col-md-4 col-form-label text-md-right">{{ __('รหัสนักศึกษา') }}</label>

                            <div class="col-md-6">
                                <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ old('student_id') }}" required autocomplete="student_id" autofocus>

                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                        <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('รหัสหลักสูตร') }}</label>
                        <div class="col-md-6"> <select name="course_id" placeholder="หลักสูตร" class="form-control" id="course_id" >
    @foreach (json_decode('{"310210101160": "310210101160", "310234601160": "310234601160"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($course_id->grade1) && $grade->grade1 == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select></div>
    {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
</div>

                        


                        <div class="form-group row">
                        <label for="course_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหลักสูตร') }}</label>
                        <div class="col-md-6"> <select name="course_name" placeholder="หลักสูตร" class="form-control" id="course_name" >
    @foreach (json_decode('{"สถิติ": "สถิติ", "สารสนเทศสถิติ": "สารสนเทศสถิติ"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($course_name->grade1) && $grade->grade1 == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select></div>
    {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
</div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
