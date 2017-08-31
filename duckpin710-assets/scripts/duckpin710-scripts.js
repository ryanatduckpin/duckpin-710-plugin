// Jquery here
$(document).ready(function(){
	
	//Lead Cert Pop Func
  $('.duckpin710-pop-contain .close-lead').on('click', function(e){
		e.preventDefault();
		$('.duckpin710-pop-contain').fadeOut('slow');
	});
	$('.duckpin710-pop-contain form').on('submit', function(){
		$('.duckpin710-pop-contain').fadeOut('slow');
	});
	
	function duckpin710_resize_text(){
		var mobileSignupText = $('.duckpin710-pop-bot form button').attr('data-mobile');
		var mobileExitText = $('.duckpin710-pop-bot a.close-lead').attr('data-mobile');
		var desktopSignupText = $('.duckpin710-pop-bot form button').attr('data-desktop');
		var desktopExitText = $('.duckpin710-pop-bot a.close-lead').attr('data-desktop');
		
		if($('body').width() >= 599){
			$('.duckpin710-pop-bot form button').html(desktopSignupText);
			$('.duckpin710-pop-bot a.close-lead').html(desktopExitText);
		} else {
			$('.duckpin710-pop-bot form button').html(mobileSignupText);
			$('.duckpin710-pop-bot a.close-lead').html(mobileExitText);
		}	
	}
	
	duckpin710_resize_text();
	
	$(window).resize(duckpin710_resize_text);
	
	var duckpin710_dismiss = Cookies.get('duckpin710_dismiss');
  if(!duckpin710_dismiss || duckpin710_dismiss == '' || duckpin710_dismiss == 'undefined' || duckpin710_dismiss == null){ //does not exist
		//there is no dismissed cookie found, so show a lead cert
	  Cookies.set('duckpin710_dismiss', 'true', {expires:1});
	  console.log('cookie should be enabled');
	  //set lead container to display block
	  $('.duckpin710-pop-contain').css('display', 'block');
  }
	
});