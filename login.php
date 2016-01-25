<?php
require_once('Configs/login_script.php');
session_start();
if (isset($_SESSION['login_user'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form in PHP with Session</title>
</head>
<link rel="stylesheet"
      href="Configs/style.css">
<body>
<div id="login">
    <form action=""
          method="post">
        <label>UserName :</label>
        <input id="name"
               name="username"
               placeholder="username"
               type="text">
        <label>Password :</label>
        <input id="password"
               name="password"
               placeholder="**********"
               type="password">
        <input name="submit"
               type="submit"
               value=" Login ">
        <span><?php echo $error; ?></span>
    </form>
</div>

</body>
</html>