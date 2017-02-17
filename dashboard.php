<?php 
require_once 'config/session.php';
require_once 'config/conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="config/proses_login.php?action=logout">Logout</a>
<?php var_dump($_SESSION); ?>
</body>
</html>