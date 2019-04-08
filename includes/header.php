<?php
  require 'config/config.php';
  include("includes/classes/User.php");
  include("includes/classes/Post.php");
  include("includes/classes/Message.php");

  if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_assoc($user_details_query);
  }
  else
    header("Location: register.php");
?>
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.Jcrop.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/bootbox.all.min.js"></script>
  <script src="assets/js/olympia.js"></script>
  <script src="assets/js/jcrop_bits.js"></script>
  <script src="assets/js/jquery.Jcrop.js"></script>

  <title>Project Olympia | Social Media Website</title>
</head>
<body>
  <div class="top_bar">
    <div class="logo">
      <a href="index.php">Olympia</a>
    </div>

    <nav>
      <a href="<?php echo $userLoggedIn ?>">
        <?php echo $user['first_name']; ?>
      </a>
      <a href="index.php"><i class="fal fa-home fa-lg"></i></a>
      <a href="javascript:void(0);" onclick="getDropdownData('<?php echo $userLoggedIn; ?>','message')"><i class="fal fa-envelope fa-lg"></i></a>
      <a href="#"><i class="fal fa-bell fa-lg"></i></a>
      <a href="requests.php"><i class="fal fa-users fa-lg"></i></a>
      <a href="#"><i class="fal fa-cog fa-lg"></i></a>
      <a href="includes/handlers/logout.php"><i class="fal fa-sign-out-alt fa-lg"></i></a>
    </nav>
    <div class="dropdown_data_window" style="height: 0px; border: none;"></div>
    <input type="hidden" id="dropdown_data_type" value="">
  </div>
  <div class="wrapper">