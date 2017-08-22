// Jquery here
$(document).ready(function(){
	var sendToEmail = "info@towsoneconomyautorental.com";
	
//process 710 Newsletter form
  $('.duckpin710-newsletter form').on('submit',function(e){
    e.preventDefault();
    $form = $(this);
    console.log('form working');
    
    //clear out errors
    var errors= 0;
    $('input,textarea').removeClass('invalid');
    
    $validateNames = ['name','email'];
    
    for(var i = 0; i > validateNames.length(); i++){
	    if($('input[name="' + validateNames[i] + '"]').val()==''){
      	errors++;
    	} 
    }
    
    if(errors==0){
      var data = $form.serialize();
      $.ajax({
        method: "POST",
        url: "../../duckpin710-processors/process-forms.php",
        data: data,
      }).done(function(msg){
        if(msg=="empty"){
          $('.duckpin710-general-error').html('Please fill the name and email fields.').fadeIn('slow');
          ga('send', 'event', 'Almost Goals', 'click', 'Newsletter Signup Error');
        }else if(msg=="sendfail"){
          $('.duckpin710-general-error').html('Error sending message. Please send an email to ' + sendToEmail).fadeIn('slow');
          ga('send', 'event', 'Almost Goals', 'click', 'Newsletter Signup Error');
        }else{
	        	ga('send', 'event', 'Goals', 'click', 'Newsletter Signup Success');
            $form.fadeOut('slow',function(){
            $('.duckpin710-success-msg').fadeIn('slow');
          });
        }
      }).fail(function(msg){
        $('.duckpin710-general-error').html('Oops! Something has gone wrong. Please send an email to ' + sendToEmail).fadeIn('slow');
        ga('send', 'event', 'Almost Goals', 'click', 'Newsletter Signup Error');
      });
    }else{
      $('.duckpin710-general-error').html('Please fill the name and email fields.').fadeIn('slow');
      ga('send', 'event', 'Almost Goals', 'click', 'Newsletter Signup Error');
    }
    
  });
	
});