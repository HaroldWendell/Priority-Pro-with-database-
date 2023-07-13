<?php
    session_start();
    include('connection.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query = "select * from users where username = '$username' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['pass_word'] == $password){
                        header("location: user.php");
                        die;
                    
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Incorrect Username or Password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Incorrect Username or Password')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="loginRegFormContainer">
        <form method="POST">
            <h1>Login</h1>
            <div class="loginFormGroup">
                <label for="username">Username</label>
                <input type="text" id="userName" name="username" placeholder="Enter your username" required>
                </div>
            <div class="loginFormGroup">
                <label for="password">Password</label>
                <input type="password" id="userPassword" name="password" placeholder="Enter your password" required>
            </div>
            <button class="button5" type="submit">Log In</button>
        </form>
    </div>
</body>
</html>