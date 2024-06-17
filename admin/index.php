<!DOCTYPE html>
<html>

<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="./dashboard css/Login admin.css">
</head>

<body>
  <?php
  include '../assets/conact/conact.php';
  include '../assets/templet/fun/fun.php';
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (isset($_SESSION['adminid'])) {
    header("Location: dashboard.php");
    exit();
}
  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $erore = array();

    if (empty($username)) {
      $erore[] = 'يجب كتابة رقم الهاتف';
    }

    if (!empty($erore)) {
      ?>
      <script>
        setTimeout(function () {
          <?php
          foreach ($erore as $error) {
            ?>
                  displayErrorMessage("<?php echo $error ?>");
                    <?php
          }
          ?>
                }, 1000)
            </script>
            <?php
    } else {
      $stmt = $con->prepare("SELECT * FROM admin WHERE name = ? AND password = ?");
      $stmt->execute(array($username, $password));
      $getuid = $stmt->fetch();

      if ($getuid) {

        $_SESSION['admin'] = $getuid['name'];
        $_SESSION['adminid'] = $getuid['idadmin'];
        ?>
        <script>
            setInterval(function () {
                location.href = 'dashboard.php';
            }, 1000);
        </script>
        <?php
      } else {
        ?>
        <script>
            setTimeout(function () {
                          displayErrorMessage('خطأ! برجاء إدخال حقول الاعتماد بشكل صحيح.');
                      }, 500)
                  </script>
                  <?php
      }
    }
  }
  ?>
  <div class="container">
    <div class="login-form">
      <h2>Login</h2>
      <form method="POST" action="">

        <input type="text" id="username" name="username" placeholder="Username"><br><br>
        <i class="bi bi-eye" id="togglePassword" style="margin-left: -0px; cursor: pointer;"></i>
        <input type="password" id="password" name="password" placeholder="Password"><br><br>
        <input type="submit" name="login" value="Login">

      </form>
    </div>
  </div>
</body>

</html>