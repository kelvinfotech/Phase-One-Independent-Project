<?php
// Including the user class file
include_once 'admin/include/class.user.php'; 
$user=new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Digital Hotel</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Include W3.CSS -->
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    
    <style>
        /* Custom CSS styles */
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
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }
    </style>
    
</head>

<body>
    <div class="container">
        <!-- Digital Hotel Logo -->
        <img class="img-responsive" src="images/digitalhotel.jpg" style="width:100%; height:180px;">      
        
        <!-- Navigation Bar -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <!-- Navigation links -->
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="room.php">Room &amp; Facilities</a></li> <!-- Current page marked as active -->
                    <li><a href="reservation.php">Online Reservation</a></li>
                    <li><a href="review.php">Review</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
            </div>
        </nav>
        
        <?php
        // Retrieving room categories from the database
        $sql="SELECT * FROM room_category";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                // Displaying room categories
                while($row = mysqli_fetch_array($result))
                {
                    echo "
                        <div class='row'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 well'>
                                <h4>".$row['roomname']."</h4><hr>
                                <h6>No of Beds: ".$row['no_bed']." ".$row['bedtype']." bed.</h6>
                                <h6>Facilities: ".$row['facility']."</h6>
                                <h6>Price: ".$row['price']." Kshs/night.</h6>
                            </div>
                            <div class='col-md-3'>
                                <!-- Book Now Button -->
                                <a href='./booknow.php?roomname=".$row['roomname']."'><button class='btn btn-primary button'>Book Now</button> </a>
                            </div>   
                        </div>
                    "; // End of echo
                }
            }
            else
            {
                // Display message if no data exists
                echo "NO Data Exist";
            }
        }
        else
        {
            // Display error message if unable to connect to the database
            echo "Cannot connect to server".$result;
        }
        ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
