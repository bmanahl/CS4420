<?php

	if(isset($_POST['login-submit'])) {

		$connection = mysql_connect("localhost", "root", "");//connecting to server
		$mailuid = $_POST['mailuid'];//fetching values from URL.
		$password = $_POST['pwd'];


		if(empty($password) || empty($email) {//checks for empty fields

			header("location: signup.php?error=emtpyfields&mail=".$email);
			exit();
		}

		if(!filter_var($mailuid, FILTER_VALIDATE_EMAIL && !preg_match("/^[a-zA-Z0-9-_]*$/", $mailuid)){//check if email/username is valid

			echo "Invalid Email or Username";
		}

		else {//matching user input email and password with stored email and password in database.

			$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
			$stmt = mysqli_stmt_init($connection);

			if(!mysqli_stmt_prepare($stmt, $sql)) {//checks sql query and db connection

				header("location: index.php?error=dberror");
				exit();

			}

			else {

				mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
				mysqli_stmt_execute($stmt);
				$resultCheck = mysqli_stmt_get_result($stmt);

				if($row = mysqli_fetch_assoc($resultCheck)) {//checks result exists

					$pwdCheck = password_verify($password, $row['pwdUsers']);

					if($pwdCheck == false) {//checks if password is false

						header("location: index.php?error=nouser");
						exit();

					}

					elseif($pwdCheck == true) {//checks if password is true

						session_start();//creates user session based on userID and userUID
						$_SESSION['userID'] = $row['idUsers'];
						$_SESSION['userUID'] = $row['uidUsers'];

						header("location: index.php?login=success");
						exit();

					}

				}

				else {//if no users are found

					header("location: index.php?error=nouser");
					exit();

				}

		}
		mysql_close ($connection);//connection closed

	}

	else {//if user accesses script without login button

		header("location: index.php");
		exit();

	}

?>