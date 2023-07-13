<?php
    session_start();
    include('connection.php');

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['confirmPassword'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query = "insert into users (username, email, pass_word, con_pass) values ('$username', '$email', '$password', '$c_password')";
            mysqli_query($con, $query);
            echo "<script type='text/javascript'> alert('Successfully')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Invalid')</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="signUpRegFormContainer">
        <form method="POST">
            <button class="backButtonContainer"><a href="index.php"><img class="backSvg" src="SVG/backButton.svg"></a>
            </button>
            <h1>SIGN UP</h1>
            <p>Please fill in this form to create an account.</p>
            <div class="signFormGroup">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <span class="errorMessage" id="usernameError"></span>
            </div>
            <div class="signFormGroup">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <span class="errorMessage" id="emailError"></span>
            </div>
            <div class="signFormGroup">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <span class="errorMessage" id="passwordError"></span>
            </div>
            <div class="signFormGroup">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                <span class="errorMessage" id="confirmPasswordError"></span>
            </div>   
            <button class="button4" type="submit" name="submit">Register</button>
        </form>
    </div>
</body>
</html>