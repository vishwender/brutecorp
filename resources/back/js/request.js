$(document).ready(function() {  
    
/* Admin panel Delete function's pop up confirmation */        
    $('.delete').click(function(){
            var answer = confirm('Are you sure you want to delete - '+jQuery(this).attr('title'));
                        // jQuery(this).attr('title') gets anchor title attribute
            return answer; // answer is a boolean
            });
            
        
});

$(document).ready(function() {
$('#on_city').click(function(){
if (this.checked ==true){
	$('#city_box').css('display','block');
	$('#state_box').css('display','block');
}
else{
	$('#city_box').css('display','none');
	$('#state_box').css('display','none');
}
   
})
});

$(document).ready(function() {

$('#post_typel').click(function(){
   $('#can1').hide('slow'); 
   
})
});

$(document).ready(function() {

$('#ag2').click(function(){
   $('#g2').show('slow'); 
   $(this).text('');
   
})
});
$(document).ready(function() {

$('#ag3').click(function(){
   $('#g3').show('slow'); 
   $(this).text('');
   
})
});
$(document).ready(function() {

$('#ag4').click(function(){
   $('#g4').show('slow'); 
   $(this).text('');
   
})
});
$(document).ready(function() {

$('#ag5').click(function(){
   $('#g5').show('slow'); 
   $(this).text('');
   
})
});

$(document).ready(function(){
  //$("input#username").change(function(){
	  $('#post_typecz').change(function() {
	  var ID=$(this).val();  
	  var ID='<div class="textfield"><label>Gallery Images*</label><input id="gallery_img" class="field" type="file" value="" name="gallery_img"></div><div class="textfield"><label>Youtube Url*:</label><input id="youtube_url" class="field" type="text" value="" name="youtube_url"></div>';
	  $('#can1').html(ID);
    
  });
});
$(document).ready(function(){
  //$("input#username").change(function(){
	  $('#post_typelz').change(function() {
	  var ID=$(this).val();  
	  var ID='';
	  $('#can1').html(ID);
    
  });
});

$(document).ready(function(){
$("#title").keyup(function() {
	var ID=$(this).val().length;
	$('#title_count').html('Count : '+ID);
});
});

$(document).ready(function(){
$("#description").keyup(function() {
	var ID=$(this).val().length;
	$('#desc_count').html('Count : '+ID);
});
});

function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	 return false;

  return true;
}