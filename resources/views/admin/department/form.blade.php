<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    <label for="department_id" class="control-label">{{ 'รหัสสาขาวิชา' }}</label>
    <input class="form-control" name="department_id" type="text" id="department_id" value="{{ isset($department->department_id) ? $department->department_id : ''}}" >
    {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('department_name') ? 'has-error' : ''}}">
    <label for="department_name" class="control-label">{{ 'ชื่อสาขาวิชา' }}</label>
    <input class="form-control" name="department_name" type="text" id="department_name" value="{{ isset($department->department_name) ? $department->department_name : ''}}" >
    {!! $errors->first('department_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
