<?php 
  session_start(); 
  
  if (isset($_POST['Submit'])) {
    $logins = array(
      'board' => 'logmeinplease123'
    );
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    if (isset($logins[$Username]) && $logins[$Username] == $Password) {
      $_SESSION['UserData']['Username'] = $logins[$Username];
      header("location:index.php");
      exit;
    }
    else {
      $msg = "<span style='color:red'>INVALID LOGIN</span>";
    }
  } 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>BOARD LOGIN</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js">
  </script>
</head>
<body>
  <br>
  <form action="" id="Login_Form" method="post" name="Login_Form">
    <table align="center" border="0" cellpadding="5" cellspacing="1" class="Table" width="400">
      <?php if(isset($msg)){?>
      <tr>
        <td align="center" colspan="2" valign="top"><?php echo $msg;?></td>
      </tr><?php } ?>
      <tr>
        <td align="left" colspan="2" valign="top">
          <h3>Login</h3>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top">Username</td>
        <td><input class="Input" name="Username" type="text"></td>
      </tr>
      <tr>
        <td align="right">Password</td>
        <td><input class="Input" name="Password" type="password"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input class="Button3" name="Submit" type="submit" value="Login"></td>
      </tr>
    </table>
  </form>
</body>
</html>