

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'สถานะ' }}</label>
    <select name="status" class="form-control" id="status" >
    @foreach (json_decode('{"ไม่ผ่านการตรวจสอบ": "ไม่ผ่านการตรวจสอบ", "รอยืนยันผลการศึกษา": "รอยืนยันผลการศึกษา", "จบการศึกษา": "จบการศึกษา"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($report->status) && $report->status == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('ps') ? 'has-error' : ''}}">
    <label for="ps" class="control-label">{{ 'หมายเหตุ' }}</label>
    <input class="form-control" name="ps" type="text" id="ps" value="{{ isset($report->ps) ? $report->ps : ''}}" >
    {!! $errors->first('ps', '<p class="help-block">:message</p>') !!}
</div>









<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
