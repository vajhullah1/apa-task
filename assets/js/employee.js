$(document).ready(function() {
    $('#datatable').dataTable();
    $("[data-toggle=tooltip]").tooltip();
    $("[data-fancybox]").fancybox({
		iframe : {
			scrolling : 'yes',
		},
		afterClose : function() {
			parent.location.reload(true);
		}
	});
});