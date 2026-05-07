<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $fname = stripslashes($_REQUEST['fname']);
        $fname = mysqli_real_escape_string($con, $fname);

        $lname = stripslashes($_REQUEST['lname']);
        $lname = mysqli_real_escape_string($con, $lname);

        $fathername = stripslashes($_REQUEST['fathername']);
        $fathername = mysqli_real_escape_string($con, $fathername);

        $mothername = stripslashes($_REQUEST['mothername']);
        $mothername = mysqli_real_escape_string($con, $mothername);

        $nationality = stripslashes($_REQUEST['nationality']);
        $nationality = mysqli_real_escape_string($con, $nationality);

        $bloodgroup = stripslashes($_REQUEST['bloodgroup']);
        $bloodgroup = mysqli_real_escape_string($con, $bloodgroup);

        $permanentaddress = stripslashes($_REQUEST['permanentaddress']);
        $permanentaddress = mysqli_real_escape_string($con, $permanentaddress);

        $presentaddress = stripslashes($_REQUEST['presentaddress']);
        $presentaddress = mysqli_real_escape_string($con, $presentaddress);

        $religion = stripslashes($_REQUEST['religion']);
        $religion = mysqli_real_escape_string($con, $religion);

        $mobile = stripslashes($_REQUEST['mobile']);
        $mobile = mysqli_real_escape_string($con, $mobile);

        $gender = stripslashes($_REQUEST['gender']);
        $gender = mysqli_real_escape_string($con, $gender);

        $age = stripslashes($_REQUEST['age']);
        $age = mysqli_real_escape_string($con, $age);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, fname, lname, fathername, mothername, nationality, bloodgroup, permanentaddress, presentaddress, religion, mobile, gender, age, password, email, create_datetime)
                     VALUES ('$username', '$fname', '$lname', '$fathername', '$mothername', '$nationality', '$bloodgroup', '$permanentaddress', '$presentaddress', '$religion', '$mobile', '$gender', '$age' , '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <div class="container mt-5">
            <h1>Registration Test</h1>
             <!-- JJJJJ Test How to build a Responsive Contact Form using Bootstrap 5
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" required>
                </div>
                <div class="col-md-6">
                <label for="fname" class="form-label">First name</label>
                    <input type="text" class="form-control" id="fname" required>
                </div>
                <div class="col-md-6">
                  <label for="emailInfo" class="form-label">E-mail</label> 
                  <input type="email" class="form-control" id="emailInfo" required> 
                </div>
                    -->
                    <form class="form" action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="username" id="floatingInput" placeholder="username" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="fname" id="floatingInput" placeholder="fname" required>
                <label for="floatingInput">First Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="lname"  id="floatingInput" placeholder="lname" required>
                <label for="floatingInput">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="fathername" id="floatingInput" placeholder="fathername" required>
                <label for="floatingInput">Father Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="mothername" id="floatingInput" placeholder="mothername" required>
                <label for="floatingInput">Mother Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="nationality" id="floatingInput" placeholder="nationality" required>
                <label for="floatingInput">Nationality</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="bloodgroup" id="floatingInput" placeholder="bloodgroup" required>
                <label for="floatingInput">Blood Group</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="permanentaddress" id="floatingInput" placeholder="permanentaddress" required>
                <label for="floatingInput">Permanent Address</label>
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="presentaddress" id="floatingInput" placeholder="presentaddress" required>
                <label for="floatingInput">Present Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="religion" id="floatingInput" placeholder="religion" required>
                <label for="floatingInput">Religion</label>
            </div>
            <!--
             <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="gender" id="floatingInput" placeholder="gender" required>
                <label for="floatingInput">Gender</label>
                
            </div>  -->

            <div class="form-floating mb-3" >
            <select class="form-select" name="gender" id="floatingSelect" aria-label="gender">
                 <option selected>Select Your Gender</option>
                 <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select>
                <label for="floatingSelect">Gender</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control  login-input" name="age" id="floatingInput" placeholder="age" required>
                <label for="floatingInput">Age</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" name="mobile" id="floatingInput" placeholder="mobile (+88 01234567890)" required>
                <label for="floatingInput">Mobile</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control  login-input" name="email" id="floatingInput" placeholder="email" required>
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control  login-input" name="password" id="floatingPassword" placeholder="password" required>
                <label for="floatingInput">Password</label>
            </div>
            <div class="col-md-12">
            <!-- <input type="submit" name="submit" value="Register" class="login-button"> Test-->
                 <button type="submit" name="submit" value="Register" class="btn btn-primary">Register</button>  

            </div>
            <p class="link"><a href="login.php">Click to Login</a></p>
           <!-- <a href="login.php"> <button class="btn btn-link">Click here to Login</button></a> -->

            </form>

                <!--
        </div>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>


            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="fname" placeholder="First name" required />

            <input type="text" class="login-input" name="lname" placeholder="Last name" required />
            <input type="text" class="login-input" name="fathername" placeholder="fname" required />
            <input type="text" class="login-input" name="mothername" placeholder="fname" required />
            <input type="text" class="login-input" name="nationality" placeholder="fname" required />
            <input type="text" class="login-input" name="bloodgroup" placeholder="Blood Group" required />
            <input type="text" class="login-input" name="permanentaddress" placeholder="fname" required />
            <input type="text" class="login-input" name="presentaddress" placeholder="fname" required />
            <input type="text" class="login-input" name="religion" placeholder="fname" required />
            <input type="text" class="login-input" name="mobile" placeholder="fname" required />
            <input type="text" class="login-input" name="gender" placeholder="fname" required />

            <input type="text" class="login-input" name="age" placeholder="fname" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
            <input type="password" class="login-input" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form> ->
    <?php
    }
    ?>
</body>

</html>