<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<link rel="stylesheet" href="/djopform/css/style.css" type="text/css">
    <title>Login</title>
    <style>
    th{
      font-size: 25px;
    }
    input{
      size="35";
    }

    </style>
</head>
<body class="animate">
  <!-- <img src="./img/network-1.jpg" width="80%" height="100"> -->
    <div class="stars"></div>
    <div class="twinkling"></div>
    <div class="clouds"></div>
    <form class="box" name="frmlogin"  method="post" action="login.php">
        <h1>ลงชื่อเข้าใช้</h1>
        <input type="text" name="txtUser" placeholder="Username">
        <input type="password" name="txtPass" placeholder="Password">
        <input type="submit" value="Login">
    </form>

</body>
</html>
