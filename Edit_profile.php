<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> بروفايل كارد</title>
  <link rel="stylesheet" href="profile.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  if (isset($_POST['edite'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    $edite = updateDataInTable('users', 'name = ?,email = ?,phone = ?', 'id = ?', array($name, $email, $phone, $_SESSION['clintid']));
    if ($edite) {
      ?>
      <script>
        location.href = 'Edit_profile.php';
      </script>
      <?php
    }
  }
  ?>
  <style>
    body {
      background-color: #01022d;
    }
  </style>


  <section class="main" style="max-width: 700px;
    margin: 120px auto 0 auto;">
    <div class="container_edite">
      <div class="title">Edit profile</div>
      <div class="content">
        <form action="" method="POST">
          <div class="user-details">

            <div class="input-box">
              <span class="details">Username</span>
              <input type="text" placeholder="Enter your username" name="name" value="<?= $profile['name'] ?>" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" placeholder="Enter your email" name="email" value="<?= $profile['email'] ?>" required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" placeholder="Enter your number" name="phone" value="<?= $profile['phone'] ?>" required>
            </div>
            <!-- <div class="input-box">
              <span class="details">Password</span>
              <input type="text" placeholder="Enter your password" required>
            </div> -->

          </div>
          <div class="button">
            <input type="submit" name="edite" value="Edit profile">
          </div>
        </form>
      </div>
    </div>
  </section>


</body>

</html>