<?php 
if (isset($_REQUEST['action'])) {
	if ($_POST['action'] == 'login') {
		# code...

		require_once 'conn.php';

		$username = $_POST['username'];
		$password = $_POST['password'];
		$remember = isset($_POST['remember_me']) ? $_POST['remember_me'] : '';

		$query = $db->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
		$query->bindParam(1, $username);
		$query->bindParam(2, $password);
		$query->execute();
		if ($query->rowCount() > 0) {
			$result = $query->fetch();

			session_start();
			$_SESSION['is_login'] = true;
			$_SESSION['username'] = $result['username'];
			
			echo 'OK';
		}
		else {
			echo 'NO';
		}
	}

	else if ($_GET['action'] == 'logout') {
		session_start();
		session_unset();
		session_destroy();
		header('location: http://localhost/t1k3t');
	}
}