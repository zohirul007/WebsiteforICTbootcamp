<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand">PGD in ICT</a>

            <button class="navbar-toggler" type="button" 
            data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
    </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#learn" class="nav-link">What you'll learn</a>
                    </li>
                    <li class="nav-item">
                        <a href="#Courses" class="nav-link">Course modules</a>
                    </li>
                     <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#Instructors" class="nav-link">Instructors</a>
                    </li>
                </ul>
            </div>

        </div>
        
    </nav>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="container">
    <form class="form" method="post" name="login">
        <h1 class=" text-center login-title">Login</h1>
        <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="username" id="floatingInput" placeholder="username" autofocus="true"/>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control  login-input" name="password" id="floatingPassword" placeholder="password" />
                <label for="floatingInput">Password</label>
            </div>
            <div class="text-center">
            <button type="submit" value="Login" name="submit" class="btn btn-primary btn-center">Login</button> 
            </div>
            


        <p class="link"><a href="registration.php">Have an account? Click here to Register</a></p>
  </form>
  
  </div>
  
<?php
    }
?>
</body>
</html>
