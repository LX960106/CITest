/***
   *
 **/
//
/*
$('#myalert').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = button.data('whatever') 
  var name = button.data('dismiss') 
  var modal = $(this)
  modal.find('.modal-title').html(recipient+"<span style='color:red;'>"+name+"</span>"+"的考勤记录")
  modal.find('.modal-body input').val(recipient)
});*/

 <div class="col-md-6 col-md-offset-3">
   <div class="list-group">
	   <a href="#" class="list-group-item btn btn-default"></a>
   </div>
</div>

$("#add_tag").click(function(){
	//alert("aaa");
	$("#exampleModalLabel").html("添加<span style='color:red;'>"+$("#name").val()+"</span>"+"的考勤记录");
});

$("#remove_tag").click(function(){
	//alert("aaa");
	$("#remove").html("取消<span style='color:red;'>"+$("#name").val()+"</span>"+"的考勤记录");
});
//alert($(".dropdown-year li"));
$(".dropdown-year li").on('click',function(event){
	$("#year").val($(this).text());
});

//密码修改
$("#hidden_button2").on('click',function(){
	
	$("#hidden_button").trigger('click');
	
});


//日历
 $('.form_date').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
    });