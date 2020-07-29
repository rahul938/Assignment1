<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<div class="container">

    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="form-box">
				<h2>Create a New Account</h2>
			<div class="social-icons">
			<img src="fb.png">
			<img src="twitter.png">
			<img src="google.png">
			</div>
	
        <form action="userAccount.php" method="post">
            <input type="text" class="input-field" name="first_name" placeholder="First Name" required="">
            <input type="text" class="input-field" name="last_name" placeholder="Last Name" required="">
            <input type="email" class="input-field" name="email" placeholder="Email Id" required="">
            <input type="text" class="input-field" name="phone" placeholder="Phone Number" required="">
            <input type="password" class="input-field" name="password" placeholder="Password" required="">
            <input type="password" class="input-field" name="confirm_password" placeholder="Confirm Password" required="">
            <div class="send-button">
                <input type="submit" name="signupSubmit" value="Create Account">
            </div>
        </form>
		<p>Already has an account. <a href="index.php">Login</a></p>
    </div>
</div>
</html>