<?php

	if(isset($_POST['reset-pwd-submit'])) {

		$selector = $_POST['selector'];
		$validator = $_POST['validator'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password-confirm'];		

		if(empty($password) || empty($password_confirm)) {//checks for empty passwords

			header("location: create_new_pwd.php?error=passwordempty");
			exit();
		}

		elseif($password !== $password_confirm) {

			header("location: create_new_pwd.php?error=passwordunmatch");
			exit();

		}


		$currentDate = date("U");

		$connection = mysql_connect("localhost", "root", "");//connecting to server

		$sql = "SELECT * FROM passwordReset WHERE resetSelector=? AND resetExpires>=?;";

		$stmt = mysqli_stmt_init($connection);

			if(!mysqli_stmt_prepare($stmt, $sql)) {//checks sql query and db connection

				header("location: create_new_pwd.php?error=dberror");
				exit();

			}

			else {

				mysqli_stmt_bind_param($stmt, "s", $selector);
				mysqli_stmt_execute($stmt);
				$resultCheck = mysqli_stmt_get_result($stmt);

				if(!$row = mysqli_fetch_assoc($resultCheck)) {

					header("location: create_new_pwd.php?error=dberror");
					echo "Resubmit your request";
					exit();

				}

			else {

				$tokenInBin = hex2bin($validator);
				$tokenCheck = password_verify($tokenInBin, $row['resetToken']);

				if($tokenCheck == false) {

					header("location: create_new_pwd.php?error=dberror");
					echo "Resubmit your request";
					exit();

				}

				elseif($tokenCheck == true) {

					$tokenEmail = $row['resetEmail'];

					$sql = "SELECT * FROM users WHERE emailUsers=?;";

					$stmt = mysqli_stmt_init($connection);

					if(!mysqli_stmt_prepare($stmt, $sql)) {//checks sql query and db connection

						header("location: create_new_pwd.php?error=dberror");
						exit();

					}

					else {

						mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
						mysqli_stmt_execute($stmt);

						$resultCheck = mysqli_stmt_get_result($stmt);

						if(!$row = mysqli_fetch_assoc($resultCheck)) {

							header("location: create_new_pwd.php?error=dberror");
							echo "Resubmit your request";
							exit();

						}

						$sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?;";

						$stmt = mysqli_stmt_init($connection);

						if(!mysqli_stmt_prepare($stmt, $sql)) {//checks sql query and db connection

							header("location: create_new_pwd.php?error=dberror");
							exit();

						}

						else {

							$newHashedPwd = password_hash($password, PASSWORD_DEFAULT);
							mysqli_stmt_bind_param($stmt, "ss", $newHashedPwd, $tokenEmail);
							mysqli_stmt_execute($stmt);

						}

						$sql = "DELETE FROM passwordReset WHERE resetEmail=?;";

						$stmt = mysqli_stmt_init($connection);

						if(!mysqli_stmt_prepare($stmt, $sql)) {

								header("location: create_new_pwd.php?error=dberror");
								exit();

						}

						else {

							mysqli_stmt_bind_param($stmt, "s", $userEmail);
							mysqli_stmt_execute($stmt);

						}

					}

				}
			}
		}
	//close sql statement and connection
	mysqli_stmt_close($stmt);
	mysqli_close($connection);

	}

	else {

		header("location: index.php");
		exit();

	}



?>