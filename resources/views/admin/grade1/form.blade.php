<label for="grade1" class="control-label">{{ 'เกรดรายวิชา' }}</label>
<div class="form-group {{ $errors->has('grade1') ? 'has-error' : ''}}">
    
    <select name="grade1" placeholder="หลักสูตร" class="form-control" id="grade1" >
    <option value="4">A</option>
   <option value="3.5">B+</option>
   <option value="3">B</option>
   <option value="2.5">C+</option>
   <option value="2">C</option>
   <option value="1.5">D+</option>
   <option value="1">D</option>
   <option value="0">F</option>
   <option value="S">S</option>
   <option value="U">U</option>
   <option value="W">W</option>
</select>
    {!! $errors->first('faculty', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
