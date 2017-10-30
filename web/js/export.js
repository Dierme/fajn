$(document).ready(function(){
	// кнопка с выбором колонок 
	$('#export_button #w0-cols').click(function(){
		$('#w0-cols-list').toggle();
	});
	// кнопка с выбором форматов
	$('#export_button .Export').click(function(){
		$(this).next().toggle();
	});
});