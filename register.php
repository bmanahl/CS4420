<?php

	if(isset($_POST['signup-submit'])) {//make sure submit button name is 'signup-submit' in html attributes

		$connection = mysql_connect("localhost", "root", "");//connecting to server

		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password = $_POST['pwd']
		$passwordRepeat = $_POST['pwd-repeat']

		//index.php is assumed to be the page where people regisiter

		if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {//checks for empty fields

			header("location: index.php?error=emtpyfields&uid=".$username."&mail=".$email);
			exit();
		}

		elseif(!filter_the($email, FILTER_VALIDATE_EMAIL && !preg_match("/^[a-zA-Z0-9-_]*$/", $username) {//checks email is valid and username is valid

			header("location: index.php?error=invalidmailuid");

			exit();

		}

		elseif(!filter_the($email, FILTER_VALIDATE_EMAIL)) {//checks email is valid

			header("location: index.php?error=invalidmail&uid=".$username);
			exit();

		}

		elseif(!preg_match("/^[a-zA-Z0-9-_]*$/", $username)) {//checks username is valid

			header("location: index.php?error=invaliduid&mail=".$email);
			exit();

		}

		elseif($password !== $passwordRepeat) {//checks password matches confirm password

			header("location: index.php?error=passwordunmatch&uid=".$username."&mail=".$email);
			exit();

		}

		elseif(strlen($password) < 8 || !preg_match("/^[a-zA-Z0-9!@#$%^&*,.?-_]*$/", $password) {

			header("location: index.php?error=invalidpassword&uid=".$username."&mail=".$email);
			exit();

		}

		else {//checks database connection

			$sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
			$stmt = mysqli_stmt_init($connection);

			if(!mysqli_stmt_prepare($stmt, $sql)) {

				header("location: index.php?error=dberror&uid=".$username."&mail=".$email);
				exit();

			}


		}

		else {//checks if username is in use

			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if($resultCheck > 0) {

				header("location: index.php?error=uidtaken&mail=".$email);
				exit();

			}
		}

		else {//adds new data to user relation

			$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?);";

			if(!mysqli_stmt_prepare($stmt, $sql)) {

				header("location: index.php?error=dberror&uid=".$username."&mail=".$email);
				exit();

			}

			else {

				hashPwd = password_hash($password, PASSWORD_DEFAULT)//hash password

				mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
				mysqli_stmt_execute($stmt);
				header("location: index.php?signup=success");
				exit();

			}

		}
		//close sql statement and connection
		mysqli_stmt_close($stmt);
		mysqli_close($connection);

	}

	else {//if user accesses script without using signup button

		header("location: index.php");
		exit();

	}

?>