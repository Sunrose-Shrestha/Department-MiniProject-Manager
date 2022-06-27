<?php
use Phppot\Member;

if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member1.php';
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<HTML>
<HEAD>
<TITLE>MEMBER LOGIN</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
	body{
        background-image:url("./assets/cmrit.jpg");
        background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */ 
	}
	.sign-up-container{
  background-image: linear-gradient(to right, #000000 , #790975);
}
.form-label{
color:white !important;
}
#login-btn{
	color:white;
	font-weight:bold;
	background: #343a40;
}
</style>
</HEAD>
<BODY>
	<h3><a href="logout.php" style="color: black"> 🏠Home </a></h3>
	<div class="phppot-container">
		<div class="sign-up-container">
			/*signup link over here*/
			<div class="signup-align">
				<form name="login" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading"  style="color:white;">Member Login</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Team-Member Email<span class="required error" id="memberemail-info"></span>
							</div>
							<input class="input-box-330" type="email" name="memberemail"
								id="memberemail">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="login-password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input class="btn btn-dark" type="submit" name="login-btn"
							id="login-btn" value="Login Now">
					</div>
				</form>
			</div>
			
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#memberemail").removeClass("error-field");
	$("#password").removeClass("error-field");

	var memberemail = $("#memberemail").val();
	var Password = $('#login-password').val();

	$("#memberemail-info").html("").hide();

	if (memberemail.trim() == "") {
		$("#memberemail-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#memberemail").addClass("error-field");
		valid = false;
	} else if (memberemail.trim() == "") {
		$("#memberemail-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#memberemail").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(memberemail)) {
		$("#memberemail-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#memberemail").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
