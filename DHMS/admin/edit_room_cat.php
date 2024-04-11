<?php
    // Including the User class file
    include_once 'include/class.user.php'; 
    
    // Creating a new User object
    $user = new User(); 
    
    // Retrieving the room category name from the URL
    $room_cat=$_GET['roomname'];
    
    // Retrieving room category details from the database based on the room name
    $sql="SELECT * FROM room_category WHERE roomname='$room_cat'";
    $query=mysqli_query($user->db, $sql);
    $row = mysqli_fetch_array($query);
    
    // Processing form submission for updating room category
    if(isset($_REQUEST['submit'])) 
    { 
        // Extracting form data
        extract($_REQUEST); 
        
        // Updating room category details using the edit_room_cat method of the User class
        $result=$user->edit_room_cat($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price,$room_cat);
        
        // Displaying a success message if the update is successful
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
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/reg.css" type="text/css">
</head>

<body>
    <div class="container">
        <div class="well">
            <h2>Edit Room Category</h2>
            <hr>
            <!-- Form for updating room category details -->
            <form action="" method="post" name="room_category">
                <div class="form-group">
                    <label for="roomname">Room Type Name:</label>
                    <!-- Input field for room name -->
                    <input type="text" class="form-control" name="roomname" value="<?php echo $row['roomname'] ?>" required>
                </div>
                 <div class="form-group">
                    <label for="qty">No of Rooms:</label>&nbsp;
                    <!-- Dropdown for selecting number of rooms -->
                    <select name="room_qnty">
                        <option value="<?php echo $row['room_qnty'] ?>"><?php echo $row['room_qnty'] ?></option>
                        <!-- Options for number of rooms -->
                        <?php for($i=1; $i<=10; $i++): ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bed">No of Bed:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- Dropdown for selecting number of beds -->
                    <select name="no_bed">
                        <option value="<?php echo $row['no_bed'] ?>"><?php echo $row['no_bed'] ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bedtype">Bed Type:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- Dropdown for selecting bed type -->
                    <select name="bedtype">
                        <option value="<?php echo $row['bedtype'] ?>"><?php echo $row['bedtype'] ?></option>
                        <option value="single">single</option>
                        <option value="double">double</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Facility">Facility</label>
                    <!-- Textarea for entering room facilities -->
                    <textarea class="form-control" rows="5" name="facility"><?php echo $row['facility'] ?></textarea>
                </div>
               <div class="form-group">
                    <label for="price">Price Per Night:</label>
                    <!-- Input field for entering price per night -->
                    <input type="text" class="form-control" name="price" value="<?php echo $row['price'] ?>" required>
                </div>
                <!-- Submit button for updating room category details -->
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Update</button>
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
