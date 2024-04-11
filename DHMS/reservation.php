<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title of the page -->
    <title>Digital Hotel</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- W3.CSS framework -->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    <!-- Custom CSS styles -->
    <style>
        /* Styling for well component */
        .well
        {
            background: rgba(0,0,0,0.5);
            border: none;
        }
		/* Body background color */
		body
		{
			background-color: white;
		}
    </style>
    
    
</head>

<body>
    <!-- Container for the content -->
    <div class="container">
        <!-- Digital Hotel Logo -->
        <img class="img-responsive" src="images/digitalhotel.jpg" style="width:100%; height:180px;">      
        
        <!-- Navigation Bar -->
        <nav class="navbar navbar-inverse">
            <!-- Navbar container -->
            <div class="container-fluid">
                <!-- Navbar links -->
                <ul class="nav navbar-nav">
                    <!-- Home link -->
                    <li><a href="index.php">Home</a></li>
                    <!-- Room & Facilities link -->
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <!-- Online Reservation link -->
                    <li><a href="reservation.php">Online Reservation</a></li>
                    <!-- Review link, marked as active -->
                    <li class="active"><a href="review.php">Review</a></li>
                    <!-- Admin link -->
                    <li><a href="admin.php">Admin</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
