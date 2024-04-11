<?php
    // Including the User class file
    include_once 'admin/include/class.user.php'; 
    // Creating a new User object
    $user = new User(); 

    // Retrieving the room name from the URL parameters
    $roomname = $_GET['roomname'];

    // Processing form submission
    if(isset($_REQUEST['submit'])) 
    { 
        // Extracting form data
        extract($_REQUEST); 
        // Calling the booknow method of the User class with form data
        $result = $user->booknow($checkin, $checkout, $name, $phone, $roomname);
        // If booking is successful, display a JavaScript alert
        if($result)
        {
            echo "<script type='text/javascript'>
                  alert('".$result."');
             </script>";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    
    <!-- Title of the page -->
    <title>Digital Hotel</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
    
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    
    <!-- jQuery and jQuery UI JavaScript -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- JavaScript for Datepicker -->
    <script>
        $(function() {
            $( ".datepicker" ).datepicker({
                dateFormat : 'yy-mm-dd'
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <!-- Header image -->
        <img class="img-responsive" src="images/digitalhotel.jpg" style="width:100%; height:180px;">
      
        <div class="well">
            <!-- Heading with the room name -->
            <h2>Book Now: <?php echo $roomname; ?></h2>
            <hr>
            <form action="" method="post" name="room_category">
                <!-- Check-in date input field -->
                <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker" name="checkin">
                </div>
                <!-- Check-out date input field -->
                <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="text" class="datepicker" name="checkout">
                </div>
                <!-- Full name input field -->
                <div class="form-group">
                    <label for="name">Enter Your Full Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="John Doe" required>
                </div>
                <!-- Phone number input field -->
                <div class="form-group">
                    <label for="phone">Enter Your Phone Number:</label>
                    <input type="text" class="form-control" name="phone" placeholder="enter phone number" required>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Book Now</button>
                <br>
                <!-- Link to return to home -->
                <div id="click_here">
                    <a href="index.php">Back to Home</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap and jQuery JS -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- jQuery UI JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>
