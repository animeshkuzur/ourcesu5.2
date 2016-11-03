
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/bootstrap.min.js') }}"></script>
    <!--Accordion JS-->
    <script src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('js/hoverintent.min.js') }}"></script>
    <script src="{{ URL::asset('js/js.cookie.js') }}"></script>

<script>/*-------more menu--------*/
        $(".content-holder").click(function() {
        $(this).find(".hidden-content").slideToggle("slow");
    });

    </script>


<script>
<!--tabs-->

$(document).ready(function() {
    $('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
});
</script>
        <script >
       $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, false ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
        
        </script>
        <script>
$(document).ready(function(){

/* Button which shows and hides div with a id of "post-details" */
$( ".toggle-visibility" ).click(function() {
  
  var target_selector = $(this).attr('data-target');
  var $target = $( target_selector );
  
  if ($target.is(':hidden'))
  {
    $target.show( "slow" );
  }
  else
  {
  	$target.hide( "slow" );
  }
  
  console.log($target.is(':visible'));

  
});
  
/* button which creates a new paragraph <p>New row added</p> */
$( ".btn-add-new-line" ).click(function() {

  var target_selector = $(this).attr('data-target');
  var $target = $( target_selector );
  
  if ($target.is(':visible'))
  {
    var newRow = "New row added";
    
  $target.append("<p>" + newRow + "</p>");
    
    console.log("row added");
    
    var i = $target.text().length;
    console.log("There is " + i + " characters in div");
    
    var p = $target.html().length;
    console.log("String length of #post-details is: " + p + " ");
  }
});

});
</script>



<script>
 
 function send_mail(name, email, phone, enquiry){

	if(name !='' && email !='' && phone !='' && enquiry != ''){
	$('#enq_err').hide();
	$('#phone_err').hide();
	$('#email_err').hide();
	$('#name_err').hide();
	//alert('ok');
	$.post('http://ourcesu.com/send_mail.php',{ name : name, email:email, phone:phone, enquiry: enquiry },function(msg){
	//alert(msg);
	$('#name').val('');
	$('#email').val('');
	$('#phone').val('');
	$('#enquiry').val('');
	$('#msg').show();
	
	
	})
		
		
	}else{
		if(name == ''){
			$('#name_err').show();

		}
		if(email==''){
			$('#email_err').show();
		}

		if(phone==''){
			$('#phone_err').show();
		}

		if(enquiry==''){
			$('#enq_err').show();
		}

	}

 }
 </script>
 <!--Accordion-->
 <script>
  $(function() {
    $( ".accordion" ).accordion({heightStyle: "content"});
  });
  </script>
  <!--Toggle Banner-->
  <script>
 jQuery(function($) {
    $(document).ready(function() {
      if(!Cookies.get('banner_status')){
        Cookies.set('banner_status', '1');    
      }
      else{
        var status = Cookies.get('banner_status');
        if(status === '0'){
          $("h3.zolo-toggle-trigger").toggleClass("active").next().slideToggle("medium");
          $("h3.mega_menu_trigger").toggleClass("active").next().slideToggle("medium");
          $("h3.menu-more-trigger").toggleClass("active").prev().slideToggle("medium");
        }
      }
		
  $("h3.zolo-toggle-trigger").next();
		  $("h3.zolo-toggle-trigger").click(function() {
			$(this).toggleClass("active").next().slideToggle("medium");
      var stat = Cookies.get('banner_status');
      if(stat === '0'){
        Cookies.set('banner_status', '1');
      }
      else{
        Cookies.set('banner_status', '0');
      }
            return false;
        });
		
	  $("h3.mega_menu_trigger").next().hide();
		  $("h3.mega_menu_trigger").click(function() {
			$(this).toggleClass("active").next().slideToggle("medium");
      var stat = Cookies.get('banner_status');
      if(stat === '0'){
        Cookies.set('banner_status', '1');
      }
      else{
        Cookies.set('banner_status', '0');
      }
            return false;
        });
		
	 $("h3.menu-more-trigger").prev().hide();
		  $("h3.menu-more-trigger").click(function() {
			$(this).toggleClass("active").prev().slideToggle("medium");
      var stat = Cookies.get('banner_status');
      if(stat === '0'){
        Cookies.set('banner_status', '1');
      }
      else{
        Cookies.set('banner_status', '0');
      }
            return false;
        });
    });
  });
  </script>