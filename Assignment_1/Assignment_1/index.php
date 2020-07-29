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
<body>
<div class="container">
    <?php
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
            include 'user.php';
            $user = new User();
            $conditions['where'] = array(
                'id' => $sessData['userID'],
            );
            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);
    ?>
	<div class="homepage">
    <h2>Welcome to homepage <?php echo $userData['first_name']; ?>!</h2>
    <a href="userAccount.php?logoutSubmit=1" class="logout">Logout</a>
    <div>
        <p><b>Name: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
        <p><b>Email: </b><?php echo $userData['email']; ?></p>
        <p><b>Phone: </b><?php echo $userData['phone']; ?></p>
    </div>
	</div>
    <?php }else{ ?>
    
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
    <div class="form-box">
	            <h2>Login to Your Account</h2>
				<div class="social-icons">
				<img src="fb.png">
				<img src="twitter.png">
				<img src="google.png">
				</div>
	
        <form action="userAccount.php" method="post">
            <input type="email" class="input-field" name="email" placeholder="Email Id" required="">
            <input type="password" class="input-field" name="password" placeholder="Password" required="">
            <input type="checkbox" class="check-box" checked><span>Remember Password</span>
			<div class="send-button">
                <input type="submit" name="loginSubmit" value="Login">
            </div>
        </form>
        <p>Don't have an account? <a href="registration.php">Register</a></p>
    </div>
    <?php } ?>
</div>
</body>
</html>