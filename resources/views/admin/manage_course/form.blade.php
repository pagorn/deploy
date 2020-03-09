<div class="d-md-flex"> 

<div class="form-group">
           
            <select class="form-control" id="department_id" name="department_id">
            <option value="" selected disabled hidden>รหัสสาขาวิชา</option>
            @foreach($department as $item)
                        <option value="{{$item->department_id}}">{{$item->department_id}}</option>
                    @endforeach
            </select>
        </div>

       
<div class="form-group">
           
            <select class="form-control" id="department_name" name="department_name">
            <option value="" selected disabled hidden>ชื่อสาขาวิชา</option>
            @foreach($department as $item)
                        <option value="{{$item->department_name}}">{{$item->department_name}}</option>
                    @endforeach
            </select>
        </div>


        
<div class="form-group">
           
            <select class="form-control"  name="course_id" id="secondmenu">
            <option value="" selected disabled hidden>รหัสหลักสูตร</option>
            @foreach($courses as $item)
                        <option value="{{$item->course_id}}">{{$item->course_id}}</option>
                    @endforeach
            </select>
        </div>





        
<div class="form-group">
           
            <select class="form-control" name="course_name" id="firstmenu">
            <option value="" selected disabled hidden>ชื่อหลักสูตร</option>
            @foreach($courses as $item)
                        <option value="{{$item->course_name}}">{{$item->course_name}}</option>
                    @endforeach
            </select>
        </div>

</div>
<div class="d-md-flex"> 
        
<div class="form-group">
           
            <select class="form-control" id="category2" name="category_name">
            <option value="" selected disabled hidden>ชื่อหมวดวิชา</option>
            @foreach($subcategory as $item)
                        <option value="{{$item->category_name}}">{{$item->category_name}}</option>
                    @endforeach
            </select>
        </div>

<div class="form-group">
           
            <select class="form-control" id="category1" name="category_id">
            <option value="" selected disabled hidden>รหัสหมวดวิชา</option>
            @foreach($subcategory as $item)
                        <option value="{{$item->category_id}}">{{$item->category_id}}</option>
                    @endforeach
            </select>
        </div>


<div class="form-group">
           
            <select class="form-control" id="group2" name="group_name">
            <option value="" selected disabled hidden>ชื่อกลุ่มวิชา</option>
            @foreach($subgroup as $item)
                        <option value="{{$item->group_name}}">{{$item->group_name}}</option>
                    @endforeach
            </select>
        </div>

      
<div class="form-group">
           
            <select class="form-control" id="group1" name="group_id">
            <option value="" selected disabled hidden>รหัสกลุ่มวิชา</option>
            @foreach($subgroup as $item)
                        <option value="{{$item->group_id}}">{{$item->group_id}}</option>
                    @endforeach
            </select>
        </div>


</div>



<div class="form-group {{ $errors->has('subject_id') ? 'has-error' : ''}}">
    <label for="subject_id" class="control-label">{{ 'รหัสรายวิชา' }}</label>
    <input class="form-control" name="subject_id" type="text" id="subject_id" value="{{ isset($manage_course->subject_id) ? $manage_course->subject_id : ''}}" >
    {!! $errors->first('subject_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('subject_name') ? 'has-error' : ''}}">
    <label for="subject_name" class="control-label">{{ 'ชื่อรายวิชา' }}</label>
    <input class="form-control" name="subject_name" type="text" id="subject_name" value="{{ isset($manage_course->subject_name) ? $manage_course->subject_name : ''}}" >
    {!! $errors->first('subject_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('subject_credit') ? 'has-error' : ''}}">
    <label for="subject_credit" class="control-label">{{ 'หน่วยกิต' }}</label>
    <input class="form-control" name="subject_credit" type="text" id="subject_credit" value="{{ isset($manage_course->subject_credit) ? $manage_course->subject_credit : ''}}" >
    {!! $errors->first('subject_credit', '<p class="help-block">:message</p>') !!}
</div>




<script type="text/javascript">
        window.onload = function() {
   document.getElementById("firstmenu").addEventListener('change',function(e) {ha(e,'secondmenu');}, false);
   document.getElementById("secondmenu").addEventListener('change',function(e) {ha(e,'firstmenu');}, false);

   document.getElementById("category1").addEventListener('change',function(e) {ha1(e,'category2');}, false);
   document.getElementById("category2").addEventListener('change',function(e) {ha1(e,'category1');}, false);

   document.getElementById("group1").addEventListener('change',function(e) {ha1(e,'group2');}, false);
   document.getElementById("group2").addEventListener('change',function(e) {ha1(e,'group1');}, false);
   
   
};
function ha (e,id){
   var index = e.target.selectedIndex;
   document.getElementById(id).selectedIndex = index;

}

   function ha1 (e,id){
   var index = e.target.selectedIndex;
   document.getElementById(id).selectedIndex = index;
}

function ha2 (e,id){
   var index = e.target.selectedIndex;
   document.getElementById(id).selectedIndex = index;

};

    </script>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
