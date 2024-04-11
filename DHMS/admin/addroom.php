<?php
    // Including the User class file
    include_once 'include/class.user.php'; 
    
    // Creating a new User object
    $user = new User(); 
    
    // Processing form submission for adding a new room
    if(isset($_REQUEST['submit'])) 
    { 
        // Extracting form data
        extract($_REQUEST); 
        
        // Adding a new room using the add_room method of the User class
        $result=$user->add_room($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price);
        
        // Displaying a success message if the room is added successfully
        if($result)
        {
            echo "<script type='text/javascript'>
                  alert('Room Added Successfully');
             </script>";
        }
        // Displaying any errors encountered during room addition
        else
        {
            echo $result;
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
            <h2>Add Room Category</h2>
            <hr>
            <!-- Form for adding a new room -->
            <form action="" method="post" name="room_category">
                <div class="form-group">
                    <label for="roomname">Room Type Name:</label>
                    <!-- Input field for room name -->
                    <input type="text" class="form-control" name="roomname" placeholder="Super Deluxe" required>
                </div>
                <div class="form-group">
                    <label for="qty">No of Rooms:</label>&nbsp;
                    <!-- Dropdown for selecting number of rooms -->
                    <select name="room_qnty">
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
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bedtype">Bed Type:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <!-- Dropdown for selecting bed type -->
                   <select name="bedtype">
                      <option value="single">Single</option>
                      <option value="double">Double</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Facility">Facility</label>
                    <!-- Textarea for entering room facilities -->
                    <textarea class="form-control" rows="5" name="facility"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price Per Night:</label>
                    <!-- Input field for entering price per night -->
                    <input type="text" class="form-control" name="price" required>
                </div>
                <!-- Submit button for adding a new room -->
                <button type="submit" class="btn btn-lg btn-primary button" name="submit" value="Add Room">Add</button>
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
