

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



  <select class="form-control" id="prod_cat_id" name="department_id">
  	
  	<option value="0" disabled="true" selected="true">รหัสสาขาวิชา</option>
  	@foreach($prod as $cat)
  		<option value="{{$cat->department_id}}">{{$cat->department_name}}</option>
  	@endforeach

  </select>




<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('change','.form-control',function(){
			// console.log("hmm its change");

			var cat_id=$(this).val();
			// console.log(cat_id);
			var div=$(this).parent();

			var op=" ";

			$.ajax({
				type:'get',
				url:'{!!URL::to('findProductName')!!}',
				data:{'id':cat_id},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					op+='<option value="0" selected disabled>รหัสหลักสูตร</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].course_id+'">'+data[i].course_name+'</option>';


             
				   }

				   div.find('.form-control-sm').html(" ");
				   div.find('.form-control-sm').append(op);
				},
				error:function(){

				}
			});
		});

		

	});
</script>




        <div class="d-md-flex"> 
<div class="form-group">
           
<select name="course_id" id="course_id" class="form-control-sm">

<option value="0" disabled="true" selected="true">รหัสหลักสูตร</option>
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
