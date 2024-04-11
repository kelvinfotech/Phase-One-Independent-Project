<?php 
    // Starting a PHP session
    session_start();
    
    // Including the User class file
    include_once 'admin/include/class.user.php';
    
    // Creating a new User object
    $user = new User();
    
    // Retrieving the user ID from the session
    $uid = $_SESSION['uid']; 
    
    // Redirecting to login page if the user session doesn't exist
    if (!$user->get_session()) 
    { 
        header("location:admin/login.php"); 
    } 
    
    // Logging out the user if 'q' parameter is set to 'logout' in the URL
    if(isset($_GET['q'])) 
    { 
        $user->user_logout();
        header("location:index.php"); 
    } 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    
    <!-- Title of the page -->
    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- W3.CSS -->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    <!-- Custom CSS -->
    <style>
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }
        
        body {
            background-color: white;
        }
        
        h4 {
            color: #ffbb2b;
        }
        
        ul {
            color: white;
            font-size: 13px;
        }
    </style>


</head>

<body>
    <div class="container">


        <img class="img-responsive" src="images/digitalhotel.jpg" style="width:100%; height:180px;">
        <!-- Navigation bar -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li><a href="reservation.php">Online Reservation</a></li>
                    <li class="active"><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Logout button -->
                    <li>
                        <a href="admin.php?q=logout">
                            <button type="button" class="btn btn-danger">Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row">
           <div class="col-md-3"></div>
            <!-- Section for Room Category management -->
            <div class="col-md-6 well">
                <h4>Room Category</h4>
                <hr>
                <ul>
                    <!-- Links for adding, showing, and editing room categories -->
                    <li><a href="admin/addroom.php">Add Room Category</a></li>
                    <li><a href="show_room_cat.php">Show All Room Category</a></li>
                    <li><a href="show_room_cat.php">Edit Room Category</a></li>
                </ul>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
           <div class="col-md-3"></div>
            <!-- Section for managing bookings -->
            <div class="col-md-6 well">
                <h4>Bookings</h4>
                <hr>
                <ul>
                    <!-- Links for booking, showing all booked rooms, and editing booked rooms -->
                    <li><a href="room.php">Book Now</a></li>
                    <li><a href="show_all_room.php">Show All Booked Rooms</a></li>
                    <li><a href="show_all_room.php">Edit Booked Room</a></li>
                </ul>
            </div>
           <div class="col-md-3"></div>
        </div>
        
        <div class="row">
           <div class="col-md-3"></div>
            <!-- Section for adding managers -->
            <div class="col-md-6 well">
                <h4>Add Manager</h4>
                <hr>
                <ul>
                    <!-- Link for adding a manager -->
                    <li><a href="admin/registration.php">Add Manager</a></li>
                </ul>
            </div>
            <div class="col-md-3"></div>
        </div>


    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
