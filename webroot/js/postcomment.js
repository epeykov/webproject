$(document).ready(function () {
	
    

	$(document).on('click', '.gallery-items', function(e) {
		
		var viewer = ImageViewer();
        var imgSrc = this.src,
            highResolutionImage = this.src;
 
        viewer.show(imgSrc, highResolutionImage);
		});
	$('.replyForm').hide();  
	$('#lastComm').hide();
	
	$(document).on('click', '.viewhide', function(e) {
	//$('.viewhide').click(function(e) {
		e.preventDefault();
		var id = $(this).get(0).id;
		
		$("#"+id+".replyForm" ).toggle("slow");
		//$("#"+id).toggleClass('replyForm').slideToggle("slow");
		
	});
	
	$(document).on('click', '.paginate a', function() {

var target = $(this).attr('href');
 if(!target)
return false;

$.post(target, function(data) {
var boxes =  $($.parseHTML(data)).filter("#boxes"); 
$('#boxes').html( boxes );
						 $('html, body').animate({
        scrollTop: $('#boxes').offset().top -90
    }, 'slow');

});

return false;
	
});

	$(document).on('click', '#addLike', function(e) {
		e.preventDefault();

	            var formData = $(this).serialize();
				var formUrl = $(this).attr('action');
			   $.ajax({
                type: 'POST',
				datatype: 'json',
                url: formUrl,
                data: formData,
                success: function(data){
					
						
						
						$('#addLike').html(data);
						//$('.replyForm').hide(); 
                       //$("#"+formId).appendChild(data);
					//window.location.reload(true);
							
	

				},
                error: function(xhr,textStatus,error){
                        alert(textStatus);
                }
            });
  });	

	$(document).on('click', '#btnlastComms', function() {
	//$('#btnlastComms').click(function() {
    
	$('#lastComm').toggleClass('open').toggle("slow");
  });
	
	$('#btnComms').click(function() {
    $('#newComm').toggleClass('open').slideToggle("slow");
	$('#lastComm').hide();
  });
  $(document).on('click', '.reply-form', function() {
  //$('.reply-form').click(function() { 
		
  //Select the parent form and submit
  $(this).closest('form').submit(function(e){
			//alert('Submit Form ');
				e.preventDefault();
            //serialize form data
            var formData = $(this).serialize();
			var formId =  $(this).attr('id');
			
            //get form action
            var formUrl = $(this).attr('action');
			 
            
            $.ajax({
                type: 'POST',
				datatype: 'json',
                url: formUrl,
                data: formData,
                success: function(data){
					
						
						
						$('#allComm').html(data);
						$('.replyForm').hide(); 
                       //$("#"+formId).appendChild(data);
					//window.location.reload(true);
							
	

				},
                error: function(xhr,textStatus,error){
                        alert(textStatus);
                }
            });	
                
            return false;
        });
	
  });	  

  
	

			
			
		
			
			
			
        $('#addComm').submit(function(e){
			
				e.preventDefault();

            //serialize form data
            var formData = $(this).serialize();
			
            //get form action
            var formUrl = $(this).attr('action');
            
            $.ajax({
                type: 'POST',
				datatype: 'json',
                url: formUrl,
                data: formData,
                success: function(data,textStatus,xhr){
					
                        $('#newComm').html(data);
						
						$('.replyForm').hide(); 
						//$('#comments').load(document.URL + ' #comments');
						 $('html, body').animate({
        scrollTop: $('#newComm').offset().top
    }, 'slow');

				},
                error: function(xhr,textStatus,error){
                        alert(textStatus);
                }
            });	
                
            return false;
        });
     });

