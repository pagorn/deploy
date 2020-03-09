<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'รหัสหมวดวิชา' }}</label>
    <input class="form-control" name="category_id" type="text" id="category_id" value="{{ isset($subcategory->category_id) ? $subcategory->category_id : ''}}" >
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('category_name') ? 'has-error' : ''}}">
    <label for="category_name" class="control-label">{{ 'ชื่อหมวดวิชา' }}</label>
    <input class="form-control" name="category_name" type="text" id="category_name" value="{{ isset($subcategory->category_name) ? $subcategory->category_name : ''}}" >
    {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
