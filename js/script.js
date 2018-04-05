@media (max-width: 768px) {
	.header {
		height: 450px;
	}
}

$(document).ready(function() {
$('.thumbnail').click(function(){
      $('.modal-body').empty();
	var width = $("#my_modal").width();
	var height = $("#my_modal").height();
	var size = $("#my_modal").attr("data-size");
	console.log("Width Is: " + width + " and Height Is:" + height + "and Size Is:" + size);  
  	var title = $(this).parent('a').attr("title");
  	$('.modal-title').html(title);
  	$($(this).parents('div').html()).appendTo('.modal-body');
  	$('#myModal').modal({show:true});
	
});
});


