

    $('#menu-projects').on('click', '.button-delete', function(e) {
    	e.preventDefault();
        var id = $(this).attr('id');
        var submit_delete = $(this).attr('name');  

        $.ajax({
			type: 'POST',
			url: '',
			data: {
				id: id,
				submit_delete: submit_delete
			},
			dataType: "text",
			success: function(data){
			    $("#menu-projects").load(' #menu-projects');
			    $('.success-delete-project').html(data);
			}
		});    
    });

	$('#add_project').click(function(){
		$('.add_form').show();
	});


	$('.button-cancel').click(function(e){
		e.preventDefault();
		$('.add_form').hide();
	});

	$('#menu-projects').on('click', '.button-edit', function(){
		$('.add_form').show();
		var id = $(this).attr('id');
		var name = $(this).attr('data-name');
		var color = $(this).attr('data-color');
		$('.add_form .button-form').attr('name', 'submit-edit');
		$('.add_form .id_project').attr('value', id);
		$('.add_form .name_value').attr('value', name);
		$('.add_form .button-color').attr('style', 'background-color: #'+color);

	});
	$('.add_task').click(function(){
		$('.form-add-task').show();
	});
	$('.button-cancel-task').click(function(e){
		e.preventDefault();
		$('.form-add-task').hide();
	});
	$('#list-tasks').on('click', '.button-task-edit', function(){
		$('.form-add-task').show();
		var $id = $(this).attr('data-task_id');
		var name_task = $(this).attr('data-name_task');
		var project_task = $(this).attr('data-project');
		var priority = $(this).attr('data-priority');
		var date = $(this).attr('data-datetime');
		$('.form-add-task .button-add-task').attr('name', 'submit-edit-task');
		$('.form-add-task .name_task').attr('value', name_task);
		$('.form-add-task .datetime').attr('value', date);
		$('.form-add-task .id_task').attr('value', $id);
		

	});
	$('#list-tasks').on('click', '.button-task-delete', function(e){
		e.preventDefault();
		var id = $(this).attr('data-task_id');
        var submit_task_delete = $(this).attr('name');
        $.ajax({
			type: 'POST',
			url: '',
			data: {
				id: id,
				submit_task_delete: submit_task_delete
			},
			dataType: "text",
			success: function(data){
			    $("#list-tasks").load(' #list-tasks .task');
			}
		});
	});

	$('#list-tasks').on('click', '.button-done-task-delete', function(e){
		e.preventDefault();
		var id = $(this).attr('data-task_id');
        var submit_task_delete = $(this).attr('name');
        alert(id);
        $.ajax({
			type: 'POST',
			url: 'fulfiled',
			data: {
				id: id,
				submit_task_delete: submit_task_delete
			},
			dataType: "text",
			success: function(data){
			    $("#list-tasks").load(' #list-tasks .task');
			}
		});
	});

	$('#list-tasks').on('click', '.button-task-done', function(){
		var id = $(this).attr('data-task_id');
		var submit_task_done = $(this).attr('name');
		$.ajax({
			type: 'POST',
			url: '',
			data: {
				id: id,
				submit_task_done: submit_task_done
			},
			dataType: "text",
			success: function(data){
			    $("#list-tasks").load('#list-tasks .task');
			}
		});
	});
	$('.link-project').click(function(){

		var link = $(this).attr('href');
		var link_project = $(this).attr('class');
		$.ajax({
			type: 'POST',
			url: link,
			data: {
				href: link,
				link_project: link_project
			},
			dataType: "text",
			success: function(data){
			    console.log(data);
			    $("#list-tasks").load('#list-tasks .task');
				//setTimeout(function(){
			    
			//}, 5000);
			}
		});
	});


	/*$('.today').on('click', '.next_days', function(e){
		e.preventDefault();
        var submit_next_days = $(this).attr('class');
        alert(submit_next_days);
        $.ajax({
			type: 'POST',
			url: 'next_days',
			data: {
				submit_next_days: submit_next_days
			},
			dataType: "text",
			success: function(data){
			    alert(data);
			    $("#list-tasks").load(' .task');
			}
		});
	});*/


    
    $(function () {
    // идентификатор элемента (например: #datetimepicker1), для которого необходимо инициализировать виджет Bootstrap DateTimePicker
	    $('#datetimepicker').datetimepicker(
	    	{
	    		format: 'YYYY-MM-DD HH:mm:ss',
	    		locale: 'en'
	    	}
	    );
  	});



$(function () { 
    $('#menu-projects li a').each(function () {
        var location = window.location.href;
        var link = this.href; 
        if(location == link) {
            $(this).parent().addClass('active');
        }
    });
});