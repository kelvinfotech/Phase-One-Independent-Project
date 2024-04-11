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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    <!-- Custom CSS styles -->
    <style>
        /* Styling for well component */
        .well
        {
            background: rgba(0,0,0,0.7);
            border: none;
        }
        /* Styling for well component with fixed height */
        .wellfix
        {
            background: rgba(0,0,0,0.7);
            border: none;
            height: 150px;
        }
		/* Body background color */
		body
		{
			background-color: white;
		}
		/* Styling for paragraphs */
		p
		{
			font-size: 13px;
		}
        /* Styling for profile picture */
        .pro_pic
        {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            margin-bottom: 15px;
            margin-right: 15px;
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
                    <!-- Home link, marked as active -->
                    <li class="active"><a href="index.php">Home</a></li>
                    <!-- Room & Facilities link -->
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <!-- Check Availability link -->
                    <li><a href="reservation.php">Check Availability</a></li>
                    <!-- Admin link -->
                    <li><a href="admin.php">Admin</a></li>                   
                </ul>
            </div>
        </nav>

        <!-- Slideshow section -->
        <div class="jumbotron">
            <div class="w3-content w3-section">
                <!-- Slideshow images -->
                <img class="mySlides w3-animate-fading" src="images/homegallery/living.jpg" style="width:100%; height:450px;">
                <img class="mySlides w3-animate-fading" src="images/homegallery/bedroom.jpg" style="width:100%; height:450px;">
                <img class="mySlides w3-animate-fading" src="images/homegallery/washroom.jpg" style="width:100%; height:450px;">
            </div>    
        </div>
        <hr>
        <!-- About section -->
        <div class="row" style="color: #ed9e21">
            <div class="col-md-12 well" >
                <h4><strong style="color: #ffbb2b">About</strong></h4>
                <!-- About text -->
                <p>Digital Hotel is a newly established hotel in Kirimaluta with the quite necessary services for its customers and also seeking expansion in the near future.</p> <br>
                <h4><strong style="color: #ffbb2b">Contact</strong></h4>
                <!-- Contact information -->
                <p>digitalhotel@gmail.com</p>
            </div>  
        </div>
    </div>

    <!-- Slide JavaScript -->
    <script src="my_js/slide.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
