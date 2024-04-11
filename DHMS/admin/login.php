<?php
    // Starting a PHP session
    session_start(); 
    
    // Including the User class file
    include_once 'include/class.user.php'; 
    
    // Creating a new User object
    $user = new User(); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/login.css" type="text/css">
    
    <!-- JavaScript for form validation -->
    <script language="javascript" type="text/javascript">
        function submitlogin() {
            var form = document.login;
            if (form.emailusername.value == "") {
                alert("Enter email or username.");
                return false;
            } else if (form.password.value == ) {
                alert("Enter Password.");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h2>Log In</h2>
            <hr>
            <!-- Login form -->
            <form action="" method="post" name="login">
                <div class="form-group">
                    <label for="emailusername">Username or Email:</label>
                    <input type="text" name="emailusername" class="form-control" value="admin" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" value="1234" required>
                </div>
                <!-- Placeholder for displaying error message for wrong input -->
                <p id="wrong_id" style=" color:red; font-size:12px; "></p>
                <!-- Submit button -->
                <button type="submit" name="submit" value="Login" onclick="retrun(submitlogin());" class="btn btn-lg btn-primary btn-block">Submit</button>
                <br>
                <!-- Link to return to home page -->
                <p style="text-align: center; font-size: 14px;"><a href="../index.php">Back To Home</a></p>
                <!-- PHP code to check login credentials -->
                <?php 
                    if(isset($_REQUEST['submit'])) { 
                        extract($_REQUEST); 
                        // Checking login credentials using the check_login method of the User class
                        $login=$user->check_login($emailusername, $password); 
                        // If login is successful, redirect to admin.php
                        if($login) { 
                            echo "<script>location='../admin.php'</script>"; 
                        } 
                        // If login fails, display an error message
                        else {?>
                            <script type="text/javascript">
                                document.getElementById("wrong_id").innerHTML = "Wrong username or password";
                            </script>
                <?php } }?>
            </form>
        </div>
    </div>
</body>

</html>
