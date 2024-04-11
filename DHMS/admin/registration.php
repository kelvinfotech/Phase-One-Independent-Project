<?php
    // Including the User class file
    include_once 'include/class.user.php'; 
    
    // Creating a new User object
    $user = new User(); 
    
    // Processing form submission
    if(isset($_REQUEST['submit'])) 
    { 
        // Extracting form data
        extract($_REQUEST); 
        
        // Registering a new user using the reg_user method of the User class
        $register = $user->reg_user($fullname, $uname, $upass, $uemail); 
        
        // If registration is successful, display a success message and redirect to admin.php
        if($register) 
        { 
            echo "
                <script type='text/javascript'>
                    alert('Added Successfully');
                </script>"; 
            echo "
                <script type='text/javascript'>
                    window.location.href = '../admin.php';
                </script>"; 
        } 
        // If registration fails due to existing username or email, display an error message
        else 
        {
            echo "
                <script type='text/javascript'>
                    alert('Username or email already exists');
                </script>";
        }
    } 
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
    <link rel="stylesheet" href="css/reg.css" type="text/css">
    
    <!-- JavaScript for form validation -->
    <script language="javascript" type="text/javascript">
        function submitreg() {
            var form = document.reg;
            if (form.name.value == "") {
                alert("Enter Name.");
                return false;
            } else if (form.uname.value == "") {
                alert("Enter username.");
                return false;
            } else if (form.upass.value == "") {
                alert("Enter Password.");
                return false;
            } else if (form.uemail.value == "") {
                alert("Enter email.");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="well">
            <h2>Add Manager</h2>
            <hr>
            <!-- Registration form -->
            <form action="" method="post" name="reg">
                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" class="form-control" name="fullname" placeholder="example: John Doe" required>
                </div>
                <div class="form-group">
                    <label for="uname">User Name:</label>
                    <input type="text" class="form-control" name="uname" placeholder="exmple: johndoe" required>
                </div>
                <div class="form-group">
                    <label for="uemail">Email:</label>
                    <input type="email" class="form-control" name="uemail" placeholder="example: johndoe@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="upass">Password</label>
                    <input type="text" class="form-control" name="upass" placeholder="abc123" required>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-lg btn-primary button" name="submit" value="Add Manager" onclick="return(submitreg());">Submit</button>
               <br>
                <!-- Link to return to admin panel -->
                <div id="click_here">
                    <a href="../admin.php">Back to Admin Panel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
