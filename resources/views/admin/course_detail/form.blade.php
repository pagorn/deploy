

<div class="form-group">
           
            <select class="form-control" id="department_id" name="department_id" required>
            <option value="" selected disabled hidden>รหัสสาขาวิชา</option>
            @foreach($department as $item)
                        <option value="{{$item->department_id}}">{{$item->department_name}}</option>
                    @endforeach
            </select>
        </div>


        <div class="d-md-flex"> 
<div class="form-group">
           
            <select class="form-control" id="course_id" name="course_id" required>
            <option value="" selected disabled hidden>รหัสหลักสูตร</option>
            @foreach($courses as $item)
                        <option value="{{$item->course_id}}">{{$item->course_name}}</option>
                    @endforeach
            </select>
        </div>


        <div class="form-group {{ $errors->has('sum_credit_coures') ? 'has-error' : ''}}">
    
    <input class="form-control" name="sum_credit_coures" placeholder="รวมหน่วยกิตทั้งหลักสูตร" type="text" id="sum_credit_coures" value="{{ isset($course_detail->sum_credit_coures) ? $course_detail->sum_credit_coures : ''}}" >
    {!! $errors->first('sum_credit_coures', '<p class="help-block">:message</p>') !!}
</div>


</div>

<div class="d-md-flex"> 
<div class="form-group">

            <select class="form-control" id="category_id" name="category_id">
            <option value="" selected disabled hidden>รหัสหมวด</option>
            @foreach($subcategory as $item)
                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                    @endforeach
            </select>
        </div>


        <div class="form-group {{ $errors->has('sum_credit_group') ? 'has-error' : ''}}">
   
    <input class="form-control" name="sum_credit_group" placeholder="รวมหน่วยกิตแต่ละหมวด" type="text" id="sum_credit_group" value="{{ isset($course_detail->sum_credit_group) ? $course_detail->sum_credit_group : ''}}" >
    {!! $errors->first('sum_credit_group', '<p class="help-block">:message</p>') !!}
</div>

        </div>


        <div class="d-flex "> 
       
<div class="form-group">
           
            <select class="form-control" id="group_id" name="group_id">
            <option value="" selected disabled hidden>รหัสกลุ่มวิชา</option>
            @foreach($subgroup as $item)
                        <option value="{{$item->group_id}}">{{$item->group_name}}</option>
                    @endforeach
            </select>
        </div>


        <div class="form-group {{ $errors->has('sum_credit_category') ? 'has-error' : ''}}">
    
    <input class="form-control" name="sum_credit_category" placeholder="รวมหน่วยกิตแต่ละกลุ่ม" type="text" id="sum_credit_category" value="{{ isset($course_detail->sum_credit_category) ? $course_detail->sum_credit_category : ''}}" >
    {!! $errors->first('sum_credit_category', '<p class="help-block">:message</p>') !!}
</div>

        </div>








<script type="text/javascript">
        window.onload = function() {
   document.getElementById("department_id").addEventListener('change',function(e) {ha(e,'course_id');}, false);
  

   
};
function ha (e,id){
   var index = e.target.selectedIndex;
   document.getElementById(id).selectedIndex = index;

};

    </script>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
