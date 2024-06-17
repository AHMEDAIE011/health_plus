<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Profle</title>
  <link rel="stylesheet" href="profile.css">
  <link rel="icon" href="images/l.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  include 'assets/conact/conact.php';
  include 'assets/templet/fun/fun.php';
  include 'assets/templet/nav/nav.php';
  $profile = getUser('*', 'users', 'id = ?', array($_SESSION['clintid']));
  ?>

  <style>
    body {
      background-color: #01022d;
    }
  </style>

  <!-- بداية صفحة بروفايل اليوزر -->


  <section class="main">
    <div class="profile-card">
      <div class="image-1">
        <img src="images/ss1.jpg" alt="" class="profile-pic">
      </div>
      <div class="data">
        <h2><?php echo $profile['name'] ?></h2>
        <!-- <span>Developer & Designer</span> -->
      </div>
      <div class="row">
        <div class="info">
          <h3>Email</h3>
          <span><?php echo $profile['email'] ?></span>
        </div>
        <div class="info">
          <h3>phone</h3>
          <span><?php echo $profile['phone'] ?></span>
        </div>
        <!-- <div class="info">
          <h3>Posts</h3>
          <span>209</span>
        </div> -->
      </div>
      <div class="buttons">
        <a href="Edit_profile.php" class="btn">Edit profile</a>
      </div>
    </div>
    <!-- نهاية صفحة بروفايل اليوزر -->


  </section>



  <?php 
  include 'footer.php';
  ?>
</body>

</html>