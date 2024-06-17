<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>health+</title>
  <link rel="stylesheet">
  <link rel="icon" href="images/l.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  body {
    background-color: #05091E;
    margin-top: 110px;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

<body>
  <?php
  include 'assets/conact/conact.php';
  include 'assets/templet/fun/fun.php';
  include 'assets/templet/nav/nav.php';
  ?>

  <!-- Start Contact -->
  <div class="Contact_Us" style="mar">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic" data-i18n="Address">Address</div>
          <div class="text-one"> Giza</div>
          <!-- <div class="text-two">Birendranagar 06</div> -->
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic" data-i18n="Phone">Phone</div>
          <div class="text-one">01033572895</div>
          <!-- <div class="text-two">+0096 3434 5678</div> -->
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic" data-i18n="Email">Email</div>
          <div class="text-one">ahmedcheck6699@gmail.com</div>
          <!-- <div class="text-two">info.codinglab@gmail.com</div> -->
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text" data-i18n="message">Send us a message</div>
        <!-- <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p> -->
        <form action="#">
          <div class="input-box">
            <input type="text" placeholder=" your name" />
          </div>
          <div class="input-box">
            <input type="text" placeholder="Enter your email" />
          </div>
          <div class="input-box message-box">
            <textarea placeholder="Enter your message"></textarea>
          </div>
          <div class="button">
            <input type="button" value="Send Now" />
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- End Contact -->



  <div class="form-popup"></div>

  <!-- <?php
  include ('footer.php');
  ?> -->

  <!-- End Footer -->


</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/lang.js"></script>
<script src="js/script.js"></script>

</html>