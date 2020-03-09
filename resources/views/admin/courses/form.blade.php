

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
    <input class="form-control" name="course_id" type="text" id="course_id" value="{{ isset($course->course_id) ? $course->course_id : ''}}" >
    {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
    <label for="course_name" class="control-label">{{ 'ชื่อหลักสูตร' }}</label>
    <input class="form-control" name="course_name" type="text" id="course_name" value="{{ isset($course->course_name) ? $course->course_name : ''}}" >
    {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
