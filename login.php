<?php
session_start();

$username = "admin";
$password = "12345";

if(isset($_POST['login'])){
    if($_POST['username'] == $username && $_POST['password'] == $password){
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Royal Pizza Hut Login</title>
<style>
body{
font-family:Arial;
background:#f5f5f5;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}
.login-box{
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.2);
width:350px;
}
input{
width:100%;
padding:10px;
margin:10px 0;
}
button{
width:100%;
padding:10px;
background:#c1121f;
color:white;
border:none;
cursor:pointer;
}
</style>
</head>
<body>

<div class="login-box">
<h2>Admin Login</h2>

<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>
</form>

</div>

</body>
</html>