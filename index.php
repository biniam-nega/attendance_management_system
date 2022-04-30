<?php
$is_pass_empty = false;
$wrong_password = false;
include("includes/db_connect.php");
if(isset($_POST['submit'])){
    if(!empty($_POST['password'])){
        $password = $_POST['password'];
        $pass_query = mysql_query("select pass from password");
        $real_pass_fetch = mysql_fetch_array($pass_query);
        $real_pass = $real_pass_fetch['pass'];
        if($password == $real_pass){
            session_start();
            $_SESSION['admin']=$password;
            header("location:home.php");
            exit;
        }
        else{
            $wrong_password = true;
        }
    }
    else{
        $is_pass_empty = true;
    }
}
?>
<html>
    <head>
        <title>Login page</title>
        <link rel=stylesheet type="text/css" href="css/index_css.css"/>
    </head>
    <body>
        <div id="header">
            <h1>EIT Attendance Management System</h1>
        </div>
        <div id="login_form">
            <form method=post>
                <fieldset>
                    <legend>Login</legend>
                    <label>Password: </label>
                    <input type="password" name="password"  size="25" maxlength="20"/>
                    <button type="submit" name="submit">
                        Login
                    </button>
                    <?php
                    if ($is_pass_empty){
                    ?>
                    <div id="warn">
                        <h3>Enter password please</h3>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ($wrong_password){
                    ?>
                    <div id="warn">
                        <h3>wrong password</h3>
                    </div>
                    <?php
                    }
                    ?>
                </fieldset>
            </form>
            <div id="instruction">
                <p>This is an online platform designed to help the Human Res ource Management department to visualize the attendance pattern of the students</p>
            </div>
        </div>
    </body>
</html>