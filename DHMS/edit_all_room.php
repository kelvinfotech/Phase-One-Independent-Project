<?php
    // Include the user class
    include_once 'admin/include/class.user.php'; 
    // Create a new instance of the User class
    $user=new User(); 

    // Get the room id from the URL
    $id=$_GET['id'];

    // SQL query to select room details based on the room id
    $sql="SELECT * FROM rooms WHERE room_id='$id'";
    // Execute the query
    $query=mysqli_query($user->db, $sql);
    // Fetch the row from the query result
    $row = mysqli_fetch_array($query);

    // If form is submitted
    if(isset($_REQUEST[ 'submit'])) 
    { 
        // Extract form data
        extract($_REQUEST); 
        // Call the edit_all_room method with form data and room id
        $result=$user->edit_all_room($checkin, $checkout, $name, $phone,$id);
        // Display result message in alert
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Digital Hotel</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- jQuery UI Datepicker -->
    <script>
        $( function() {
            $( ".datepicker" ).datepicker({
                dateFormat : 'yy-mm-dd'
            });
        });
    </script>    
</head>

<body>
    <div class="container">
        <!-- Digital Hotel Logo -->
        <img class="img-responsive" src="images/digitalhotel.jpg" style="width:100%; height:180px;">      
        
        <!-- Edit Room Form -->
        <div class="well">
            <h2>EDIT</h2>
            <!-- Display room category -->
            <h2><?php echo  $row['room_cat']?></h2>
            <hr>
            <!-- Form to update room details -->
            <form action="" method="post" name="room_category">              
                <div class="form-group">
                    <!-- Check-in date input -->
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="datepicker" name="checkin" value="<?php echo $row['checkin']?>">
                </div>
               
                <div class="form-group">
                    <!-- Check-out date input -->
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="text" class="datepicker" name="checkout" value="<?php echo $row['checkout']?>">
                </div>
                <div class="form-group">
                    <!-- Name input -->
                    <label for="name">Enter Your Full Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>" required>
                </div>
                <div class="form-group">
                    <!-- Phone input -->
                    <label for="phone">Enter Your Phone Number:</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']?>" required>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Update</button>
                <br>
                <!-- Back to Admin Panel link -->
                <div id="click_here">
                    <a href="admin.php">Back to Admin Panel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
