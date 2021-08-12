$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

$('.mecmessage a').click(function(){
    $('.meclogin').animate({height: "toggle", opacity: "toggle"}, "slow");    
  });
$('.usermessage a').click(function(){
    $('.userlogin').animate({height: "toggle", opacity: "toggle"}, "slow");    
  });


  var ucheck = function() {
    if (document.getElementById('upassword').value == 
    document.getElementById('uconfirmpassword').value) {
      document.getElementById('umessage').style.color = '#4a8bcf';
      document.getElementById('umessage').innerHTML = 'Matching';
      document.getElementById("uButton").disabled = false;
    } else {
      document.getElementById('umessage').style.color = 'red';
      document.getElementById('umessage').innerHTML = 'Not Matching';
      document.getElementById("uButton").disabled = true;
    }
  };

  var mcheck = function() {
    if (document.getElementById('mpassword').value ==
      document.getElementById('mconfirmpassword').value ) {
      document.getElementById('mmessage').style.color = '#4a8bcf';
      document.getElementById('mmessage').innerHTML = 'Matching';
      document.getElementById("mButton").disabled = false;
    } else {
      document.getElementById('mmessage').style.color = 'red';
      document.getElementById('mmessage').innerHTML = 'Not Matching';
      document.getElementById("mButton").disabled = true;
    }
  };