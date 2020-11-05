<?php

session_start();
if(isset($_SESSION['user']) &&  isset($_SESSION['pass']))
{
	if($_SESSION['user'] != 'admin' || $_SESSION['pass'] != '123')
	{
		header('Location:login.php');
	}
}
else
{
	header('Location:login.php');
}


include('source/class.php');
$p = new upload();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" enctype="multipart/form-data" name="form1" method="post" action="">
  Mời chọn file cần Upload:
    <input type="file" name="file" id="file" />
  <input type="submit" name="button" id="button" value="Submit" />

 <?php
 
  switch($_POST['button'])
  {
	case 'Submit':
	{
		$name = $_FILES['file']['name'];
		$size = $_FILES['file']['size'];
		$local = $_FILES['file']['tmp_name'];
		$type = $_FILES['file']['type'];
		
		if($type == 'application/pdf' && $size <= 1000000)
		{
			if($p->uploaded($local,"data",$name) == 1)
			{
				echo "upload successful";	
			}
			else
			{
				echo 'upload fail';	
			}
				
			}
		else
		{
			echo 'Hệ thống chỉ cho phép upload file application có size < 1M';	
		}
		break;
		}
	}
  echo '<br>';
  echo $_COOKIE['key'];
  ?>

</form>
</body>
</html>