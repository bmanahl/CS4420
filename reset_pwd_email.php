<?php

	if(isset($_POST['forgot-pwd-submit'])) {//checks user accessed script via forgot password link

		$selector = bin2hex(random_bytes(8));
		$token = random_bytes(32);

		$url = "www.mothersagainstai.com/create_new_pwd.php?selector=".$selector."&validator=".bin2hex($token);//might need to be changed based on server requirements

		$expires = date("U") + 900;

		$connection = mysql_connect("localhost", "root", "");//connecting to server

		$userEmail = $_POST['email'];

		if(!filter_the($email, FILTER_VALIDATE_EMAIL)) {//checks email is valid

			header("location: forgot_pwd.php?error=invalidmail");
			exit();

		}



		$sql = "DELETE FROM passwordReset WHERE resetEmail=?;";

		$stmt = mysqli_stmt_init($connection);

		if(!mysqli_stmt_prepare($stmt, $sql)) {

				header("location: forgot_pwd.php?error=dberror");
				exit();

		}

		else {

			mysqli_stmt_bind_param($stmt, "s", $userEmail);
			mysqli_stmt_execute($stmt);

		}

		$sql = "INSERT INTO passwordReset (resetEmail, resetSelector, resetToken, resetExpires) VALUES (?,?,?,?);";

		$stmt = mysqli_stmt_init($connection);

		if(!mysqli_stmt_prepare($stmt, $sql)) {

				header("location: forgot_pwd.php?error=dberror");
				exit();

		}

		else {

			$hashedToken = password_hash($token, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
			mysqli_stmt_execute($stmt);

		}


	}
	//close sql statement and connection
	mysqli_stmt_close($stmt);
	mysqli_close($connection);


	//email contents
	$to = $userEmail;
	$subject = "Reset Password for Mothers Against AI";
	$message = "We have recieved a password reset request. The link to reset your password is below. If you did not make this request ignore this email.";
	$message .= "Reset Link:";
	$message .= '<a href"'.$url.'">'.$url.'</a>'; //make sure hyperlink works

	$headers = "From: www.mothersagainstai.com <@>\r\n";//email sent from
	$headers .= "Reply To: www.mothersagainstai.com <@>\r\n";//email to reply to
	$headers .= "Content-type: text/html\r\n";


	mail($to, $subject, $message, $headers);

	header("location: forgot_pwd.php?reset=success");

	else {//kicks usser to front page if the did not access script via forgot password link

		header("location: index.php");
		exit();

	}

?>