<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$allcat = getall('*', 'category');

if (isset($_POST['Log_In'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $con->prepare('SELECT * FROM users WHERE email = ?  AND password = ?');
    $stmt->execute([$email, $password]);
    $getuid = $stmt->fetch();

    if ($getuid) {
        $_SESSION['clint'] = $getuid['email'];
        $_SESSION['clintid'] = $getuid['id'];
        $_SESSION['name'] = $getuid['name'];

        ?>
        <script>
            setTimeout(function () {
                setTimeout("location.href = 'index.php'", 500);
            }, 500);
        </script>
        <?php
    }
}
if (isset($_POST['Signup'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $errore = [];

    if (empty($name)) {
        $errore[] = 'Name is required';
    }
    if ($password != $password2) {
        $errore[] = 'كلمه السر غير مطابقه';
    }

    if (!empty($errore)) {
    } else {
        $add = insertdatatotabul(
            'users',
            'name,email,password',
            ':name,:email,:pass',
            [
                'name' => $name,
                'email' => $email,
                'pass' => $password,
            ]
        );
    }
}
?>
<style>
    body {
        margin: 0;
        font-family: sans-serif;
        background-color: #05091E;
    }

    .nav-item.dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-menu .dropdown-item {
        color: black !important;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #f1f1f1;
    }

    /* Show the dropdown menu on hover */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }
</style>

<header>

    <nav class="navbar">
        <span class="hamburger-btn material-symbols-rounded"><i class="fas fa-grip-lines"></i></span>
        <a href="index.php" class="logo">
            <img src="images/l.png" alt="logo">
            <h2 data-i18n="health">Health+</h2>
        </a>

        <ul class="links">
            <span class="close-btn material-symbols-rounded"><i class="fas fa-times"></i></span>
            <li><a href="index.php" class="active" data-i18n="home">Home</a></li>
            <li><a href="About_Us.php" data-i18n="about">About us</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button">Product</a>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($allcat as $cat) {
                        ?>
                        <li>
                            <a class="dropdown-item" href="itemforcat.php?cat=<?php echo $cat['id']; ?>"><?php echo $cat['categoryname']; ?>
                            </a>
                        </li>
                        <?php
                    }
?>

                </ul>
            </li>

            <li><a href="Contact.php" data-i18n="contact">Contact us</a></li>

            <?php
            if (!isset($_SESSION['name'])) {
                echo '<button class="button1" id="form-open" data-i18n="Log">Login</button>';
            } else {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button">profile</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="profile.php">profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
                <?php
            }
?>
            <li class="nav-item">
                <select id="en" class="nav-link">
                    <option value="en" data-i18n="english">English</option>
                    <option value="ar" data-i18n="arabic">Arabic</option>
                </select>
            </li>
        </ul>

        <div class="shopping-cart">
            <a href="viewcart.php"><i class="fas fa-shopping-cart shoppingCartButton"></i></a>
        </div>

    </nav>
</header>

<!-- Start login -->
<!-- ......start login............. -->
<!-- Home -->
<section class="home">
    <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
            <form action="#" method="POST">
                <h2>Login</h2>

                <div class="input_box">
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="password" name="password" placeholder="Enter your password" required />
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>

                <div class="option_field">
                    <span class="checkbox">
                        <input type="checkbox" id="check" />
                        <label for="check">Remember me</label>
                    </span>
                    <a href="Forgot-password.html" class="forgot_pw">Forgot password?</a>
                </div>

                <button class="button" type="submit" name="Log_In">Login Now</button>

                <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
            </form>
        </div>

        <!-- Signup From -->
        <div class="form signup_form">


            <form action="#" method="POST">
                <h2>Signup</h2>

                <div class="input_box">
                    <input type="text" name="username" placeholder="Enter your username" required />
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="email" name="email" placeholder="Enter your email" required />
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="password" name="password" placeholder="Create password" required />
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>
                <div class="input_box">
                    <input type="password" name="password2" placeholder="Confirm password" required />
                    <i class="uil uil-lock password"></i>
                    <i class="uil uil-eye-slash pw_hide"></i>
                </div>

                <button type="submit" name="Signup" class="button">Signup Now</button>

                <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
            </form>


            
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdown = document.querySelector('.nav-item.dropdown');
        dropdown.addEventListener('mouseover', function () {
            dropdown.querySelector('.dropdown-menu').style.display = 'block';
        });
        dropdown.addEventListener('mouseout', function () {
            dropdown.querySelector('.dropdown-menu').style.display = 'none';
        });
    });

</script>