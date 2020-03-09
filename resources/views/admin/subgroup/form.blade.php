

<label for="category_id" class="control-label">{{ 'รหัสหมวดวิชา' }}</label>
<div class="form-group">
           
            <select class="form-control" id="category_id" name="category_id">
            @foreach($subcategory as $item)
                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                    @endforeach
            </select>
        </div>

<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'รหัสกลุ่มวิชา' }}</label>
    <input class="form-control" name="group_id" type="text" id="group_id" value="{{ isset($subgroup->group_id) ? $subgroup->group_id : ''}}" >
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('group_name') ? 'has-error' : ''}}">
    <label for="group_name" class="control-label">{{ 'ชื่อกลุ่มวิชา' }}</label>
    <input class="form-control" name="group_name" type="group_name" id="group_name" value="{{ isset($subgroup->group_name) ? $subgroup->group_name : ''}}" >
    {!! $errors->first('group_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
