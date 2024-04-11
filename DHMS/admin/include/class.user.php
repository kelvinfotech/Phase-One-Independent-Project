<?php
    // Include database configuration file
    include "db_config.php";
    
    // User class definition
    class user
    {
        // Database connection object
        public $db;
        
        // Constructor to establish database connection
        public function __construct()
        {
            // Creating a new mysqli connection object
            $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, 'digitalhotel');
            
            // Check if connection is successful
            if(mysqli_connect_errno())
            {
                echo "Error: Could not connect to database.";
                exit;
            }
        }
        
        // Function to register a new user
        public function reg_user($name, $username, $password, $email)
        {
            // Check if the username or email already exists in the database
            $sql = "SELECT * FROM manager WHERE uname='$username' OR uemail='$email'";
            $check = $this->db->query($sql);
            $count_row = $check->num_rows;
            
            // If username or email does not exist, insert new user data into database
            if($count_row == 0)
            {
                $sql1 = "INSERT INTO manager SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
                $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                return $result;
            }
            else
            {
                return false;
            }
        }
        
        // Function to add a new room category
        public function add_room($roomname, $room_qnty, $no_bed, $bedtype, $facility, $price)
        {
            // Insert new room category into room_category table
            $available = $room_qnty;
            $booked = 0;
            $sql = "INSERT INTO room_category SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price'";
            $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()."Data cannot inserted");
            
            // Insert corresponding rooms into rooms table
            for($i = 0; $i < $room_qnty; $i++)
            {
                $sql2 = "INSERT INTO rooms SET room_cat='$roomname', book='false'";
                mysqli_query($this->db, $sql2);
            }
            
            return $result;
        }
        
        // Function to check available rooms based on check-in and check-out dates
        public function check_available($checkin, $checkout)
        {
            // Query to check available rooms for the given dates
            $sql = "SELECT DISTINCT room_cat FROM rooms WHERE room_id NOT IN (SELECT DISTINCT room_id FROM rooms WHERE (checkin <= '$checkin' AND checkout >='$checkout') OR (checkin >= '$checkin' AND checkin <='$checkout') OR (checkin <= '$checkin' AND checkout >='$checkin'))";
            $check = mysqli_query($this->db, $sql)  or die(mysqli_connect_errno()."Query Doesnt run");
            
            return $check;
        }
        
        // Function to book a room
        public function booknow($checkin, $checkout, $name, $phone, $roomname)
        {
            // Query to check available rooms for booking
            $sql = "SELECT * FROM rooms WHERE room_cat='$roomname' AND (room_id NOT IN (SELECT DISTINCT room_id FROM rooms WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
            $check = mysqli_query($this->db, $sql)  or die(mysqli_connect_errno()."Data herecannot inserted");
            
            // If available room found, book the room
            if(mysqli_num_rows($check) > 0)
            {
                $row = mysqli_fetch_array($check);
                $id = $row['room_id'];
                
                $sql2 = "UPDATE rooms SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE room_id=$id";
                $send = mysqli_query($this->db, $sql2);
                
                if($send)
                {
                    $result = "Your Room has been booked!!";
                }
                else
                {
                    $result = "Sorry, Internal Error";
                }
            }
            else                       
            {
                $result = "No Room Is Available";
            }
            
            return $result;
        }
        
        // Function to edit booking details of a room
        public function edit_all_room($checkin, $checkout, $name, $phone, $id)
        {
            $sql2 = "UPDATE rooms SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE room_id=$id";
            $send = mysqli_query($this->db, $sql2);
            
            if($send)
            {
                $result = "Your Room has been booked!!";
            }
            else
            {
                $result = "Sorry, Internal Error";
            }
            
            return $result;
        }
        
        // Function to edit room category details
        public function edit_room_cat($roomname, $room_qnty, $no_bed, $bedtype, $facility, $price, $room_cat)
        {
            $sql2 = "DELETE FROM rooms WHERE room_cat='$room_cat'";
            mysqli_query($this->db, $sql2);
            
            for($i = 0; $i < $room_qnty; $i++)
            {
                $sql3 = "INSERT INTO rooms SET room_cat='$roomname', book='false'";
                mysqli_query($this->db, $sql3);
            }
            
            $available = $room_qnty;
            $booked = 0;
            
            $sql = "UPDATE room_category SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price' WHERE roomname='$room_cat'";
            $send = mysqli_query($this->db, $sql);
            
            if($send)
            {
                $result = "Updated Successfully!!";
            }
            else
            {
                $result = "Sorry, Internal Error";
            }
            
            return $result;
        }
        
        // Function to check user login credentials
        public function check_login($emailusername, $password)
        {
            $sql2 = "SELECT uid from manager WHERE uemail='$emailusername' OR uname='$emailusername' and upass='$password'";
            $result = mysqli_query($this->db, $sql2);
            $user_data = mysqli_fetch_array($result);
            $count_row = $result->num_rows;
            
            if($count_row == 1)
            {
                $_SESSION['login'] = true;
                $_SESSION['uid'] = $user_data['uid'];
                return true;    
            }
            else
            {
                return false;
            }
        }

        // Function to get user session status
        public function get_session()
        {
            return $_SESSION['login'];
        }
        
        // Function to log out the user
        public function user_logout()
        {
            $_SESSION['login'] = false;
            session_destroy();
        }
    }
?>
