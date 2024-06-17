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

<body>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background-color: #05091E;
    }
  </style>

  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  include 'assets/conact/conact.php';
  include 'assets/templet/fun/fun.php';
  include 'assets/templet/nav/nav.php';

  ?>


  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/222.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 data-i18n="ah2"> اهلا ومرحبا بك في موقع صحتك
            <hr>
            هنوفرلك كل احتياجاتك من المكملات اليومية بأرخص الاسعار
            توفر مجموعة متنوعه من المكملات الغذئية مثل البروتين والفايتمين والكرياتين
          </h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/111.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 data-i18n="ah2"> اهلا ومرحبا بك في موقع صحتك
            <hr>
            هنوفرلك كل احتياجاتك من المكملات اليومية بأرخص الاسعار
            توفر مجموعة متنوعه من المكملات الغذئية مثل البروتين والفايتمين والكرياتين
          </h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/back1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 data-i18n="ah2"> اهلا ومرحبا بك في موقع صحتك
            <hr>
            هنوفرلك كل احتياجاتك من المكملات اليومية بأرخص الاسعار
            توفر مجموعة متنوعه من المكملات الغذئية مثل البروتين والفايتمين والكرياتين
          </h5>

        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Start Footer -->
  <!-- <div class="form-popup"></div> -->

  <?php
  include ('footer.php');
  ?>
  <!-- End Footer -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.6.0.js"></script>
  <script src="js/lang.js"></script>
  <script src="js/script.js"></script>
</body>

</html>