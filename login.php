<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>Nhập Username:
    <input type="text" name="user" id="user" />
  </p>
  <p>Nhập Password:
    <input type="text" name="pass" id="pass" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit" />
  </p>
  <?php
  
 $thoihan = time() + 15;
 setcookie('key','Upload di ban oi', $thoihan);
  switch($_POST['button'])
  {
	case 'Submit':
	{
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];
		if($user == 'admin' && $pass == '123')
		{
			session_start();
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			header('location:admin.php');
		}
		else
		{
			echo 'may la ai';
		}
	}	 
}
  
  
  ?>
</form>
</body>
</html>