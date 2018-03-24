<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Person Info</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<script type="text/javascript">
jQuery(function() {	
	// calculator -1 
	jQuery('div #personinfo').delegate( '#btnsubmit', 'click', function(evnt) {
		//envt.preventDefault();
		var fname = jQuery('#fname');
		var fname_val = fname.val();
		
		var lname = jQuery('#lname');
		var lname_val= lname.val();
		
		var mobile = jQuery('#mobile');
		var mobile_val= mobile.val();
		var mob_char_count = mobile_val.length;
		//alert(mob_char_count);
		
		var address = jQuery('#address');
		var address_val= address.val();
		
		var email = jQuery('#email');
		var email_val= email.val();
		
		//
		
		if(fname_val == "" || fname_val ==null){
			alert('Please input First Name!');
			fname.focus();
			return false;
		}
		if(mobile_val == "" || mobile_val ==null){
			alert('Please input Mobile Number!');
			mobile.focus();
			return false;
		}
		else{
			var filter = /^[0-9-+]+$/;
			var number_validate = filter.test(mobile_val);
			if (!number_validate) {
				 alert('Only Number is allowed as Mobile Number!');
				 return false;
			}
			if(mob_char_count<11){
				
				alert("Mobile No Cannot be Less than 11 Digit!");
				return false;
			}
		}
		if(address_val == "" || address_val ==null){
			alert('Please input Address!');
			address.focus();
			return false;
		}
		if(email_val == "" || email_val ==null){
			alert('Please input Email!');
			email.focus();
			return false;
		}
		else{
			var regx = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			var emailFormat = regx.test(email_val);
			if (!emailFormat) {
				alert("Please Enter a valid email!");
				return false;
			}
		}
		 var baseURL = $(this).data("url");
		jQuery.ajax({
				type: "POST",
				//url: '</?php echo realpath(dirname(__FILE__));?>\person.php',
				url: baseURL,
				data: {
				  fname: fname_val,
				  lname: lname_val,
				  mobile: mobile_val,
				  address: address_val,
				  email: email_val
				},
				success: function (data) {
					console.log(data);
				},
				error : function(s , i , error){
					//console.log(error);
				}
				
		});
		
	});
	// end
});		
</script>
</head>

<body style="background-color:#66CCFF;">
<div id="result" style="text-align:center;background-color:#6699FF;width:60%;margin-left:18%;padding:20px;">
	<div style="clear:both;color:#900000;font-weight:bold;padding-bottom:5px;"></div>
<?php
if($_POST){
	$first_name = $_REQUEST['fname'];
	$last_name = $_REQUEST['lname'];
	$mobile = $_REQUEST['mobile'];
	$address = $_REQUEST['address'];
	$email = $_REQUEST['email'];
	//die($mobile);
	?>
    <?php
}
?>
</div>
<style type="text/css">
	.cont{
		clear:both;
		padding-left:15px;
		padding-top:5px;
	}
	.operation{
		padding-bottom:20px;
	}
	.inputtext{
		width:250px;
	}
	.btn{
		height:30px;
		width:60px;
		background-color:#6699FF;
		color:#FFFFFF;
	}
	.req_spn{
		color:red;
	}
</style>
<div style="background-color:#FFFFFF; width:60%;min-height:550px;margin-left:18%;padding:20px;">
   <div style="text-align:center;padding-bottom:15px;"> <h2>Person Info </h2><hr/></div>
    
   <div id="personinfo" style="padding-left:20px;">	
        <form id="person" method="post">
            <div id="person_info" class="operation">
                <div> First Name:</div>
                <div class="cont" > 
                    <input class="inputtext" type="text" id="fname" name="fname" placeholder="Please Input First Name" /><span class="req_spn" >*</span>
                </div>
                <div> Last Name:</div>
                <div class="cont" > 
                    <input class="inputtext" type="text" id="lname" name="lname" placeholder="Please Input Last Name" />
                </div>
                <div> Mobile:</div>
                <div class="cont" > 
                    <input class="inputtext" type="text" id="mobile" name="mobile" placeholder="Please Input Mobile No" maxlength="11" /><span class="req_spn" >*</span>
                </div>
                <div> Addres:</div>
                <div class="cont" > 
                    <input class="inputtext" type="text" id="address" name="address" placeholder="Please Input Address" /><span class="req_spn" >*</span>
                </div>
                <div> Email:</div>
                <div class="cont" > 
                    <input class="inputtext" type="text" id="email" name="email" placeholder="Please Input Email" /><span class="req_spn" >*</span>
                </div>
                <br>
                <input class="btn" type="button" id="btnsubmit" value="Submit" />
            </div>
        </form>
        
  </div>  
</div>

</body>
</html>
