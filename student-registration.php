<?php
use Phppot\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member1.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>
<HTML>
<HEAD>
<TITLE>User Registration</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<style>
		body{
        background-image:url("./assets/cmrit.jpg");
        background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
    }
.sign-up-container{
  background-image: linear-gradient(to right, #000000,#790975);
}
.form-label{
color:white !important;
}
#signup-btn{
	color:white;
	font-weight:bold;
	background: #343a40;
}
</style>
<BODY>
	<h2><a href="logout.php" style="color: black"> 🏠Home </a></h2>
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="studentlogin.php" style="color:white">Login</a>
			</div>
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading" style="color:white">Team Registration</div>
				<?php
    if (! empty($registrationResponse["status"])) {
        ?>
                    <?php
        if ($registrationResponse["status"] == "error") {
            ?>
				    <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        } else if ($registrationResponse["status"] == "success") {
            ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        }
        ?>
				<?php
    }
    ?>	<div class="error-msg" id="error-msg"></div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Team-Lead name<span class="required error" id="leadname-info"></span>
							</div>
							<input class="input-box-330" type="text" name="leadname"
								id="leadname">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Member name<span class="required error" id="membername-info"></span>
							</div>
							<input class="input-box-330" type="text" name="membername"
								id="membername">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Team-Lead email<span class="required error" id="leademail-info"></span>
							</div>
							<input class="input-box-330" type="email" name="leademail" id="leademail">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Member email<span class="required error" id="memberemail-info"></span>
							</div>
							<input class="input-box-330" type="email" name="memberemail" id="memberemail">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Team Password<span class="required error" id="signup-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="signup-password" id="signup-password">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm Password<span class="required error"
									id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="confirm-password" id="confirm-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Sign up">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
function signupValidation() {
	var valid = true;
	$("#leadname").removeClass("error-field");
	$("#membername").removeClass("error-field");
	$("#leademail").removeClass("error-field");
	$("#memberemail").removeClass("error-field");
	$("#password").removeClass("error-field");
	$("#confirm-password").removeClass("error-field");
	var LeadName = $("#leadname").val();
	var MemberName = $("#membername").val();
	var leademail = $("#leademail").val();
	var memberemail = $("#memberemail").val();
	var Password = $('#signup-password').val();
    var ConfirmPassword = $('#confirm-password').val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	$("#leadname-info").html("").hide();
	$("#membername-info").html("").hide();
	$("#leademail-info").html("").hide();
	$("#memberemail-info").html("").hide();
	if (LeadName.trim() == "") {
		$("#leadname-info").html("required.").css("color", "#ee0000").show();
		$("#leadname").addClass("error-field");
		valid = false;
	}
	if (MemberName.trim() == "") {
		$("#membername-info").html("required.").css("color", "#ee0000").show();
		$("#membername").addClass("error-field");
		valid = false;
	}
	if (leademail == "") {
		$("#leademail-info").html("required").css("color", "#ee0000").show();
		$("#leademail").addClass("error-field");
		valid = false;
	} else if (leademail.trim() == "") {
		$("#leademail-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#leademail").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(leademail)) {
		$("#leademail-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#leademail").addClass("error-field");
		valid = false;
	}
	if (memberemail == "") {
		$("#memberemail-info").html("required").css("color", "#ee0000").show();
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
		$("#signup-password-info").html("required.").css("color", "#ee0000").show();
		$("#signup-password").addClass("error-field");
		valid = false;
	}
	if (ConfirmPassword.trim() == "") {
		$("#confirm-password-info").html("required.").css("color", "#ee0000").show();
		$("#confirm-password").addClass("error-field");
		valid = false;
	}
	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
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
