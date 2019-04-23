<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
<body>
  <img src="./img/network-1.jpg" width="100%" height="125">
<div style="display: flex; justify-content: center; padding-top: 100px">
    <form name="frmlogin"  method="post" action="login.php">
        <table cellspacing="20" >
            <tr align="center" ><th colspan ="2">ลงชื่อเข้าใช้</th></tr>
            <tr>
                <td cellspacing="10"> ชื่อผู้ใช้ </td>
                <td> : <input type="text" id="Username" name="txtUser" placeholder="Username"required></td>
            </tr>
            <tr>
                <td> รหัสผ่าน </td>
                <td> : <input type="password" id="Password"  name="txtPass" placeholder="Password"required></td>
            </tr>
            <tr><td align="center" colspan ="2"><button type="submit">Login</button>
                &nbsp;&nbsp;
                <button type="reset">Reset</button></td></tr>
        </table>
    </form>
</body>
</html>
