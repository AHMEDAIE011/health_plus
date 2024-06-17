<?php
include 'assets/templet/conact/conact.php';

?>

<div class="blur-bg-overlay"></div>
<div class="form-popup">
    <span class="close-btn material-symbols-rounded"><i class="fas fa-times"></i></span>
    <div class="form-box login">
        <div class="form-details">
            <!-- هنا ممكن تحط مرحبا بك او اي كلام علي صورة تسجيل الدخول -->
        </div>
        <div class="form-content">
            <h2>LOGIN</h2>
            <form action="#">
                <div class="input-field">
                    <input type="text" required>
                    <label>Email</label>
                </div>
                <div class="input-field">
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <a href="#" class="forgot-pass-link">Forgot password?</a>
                <button type="submit">Log In</button>
            </form>
            <div class="bottom-link">
                Don't have an account?
                <a href="#" id="signup-link">Signup</a>
            </div>
        </div>
    </div>
    <div class="form-box signup">
        <div class="form-details">
            <!-- هنا ممكن تحط مرحبا بك او اي كلام علي صورة تسجيل الدخول -->
        </div>
        <div class="form-content">
            <h2>SIGNUP</h2>
            <form action="#">
                <div class="input-field">
                    <input type="text" required>
                    <label>Enter your email</label>
                </div>
                <div class="input-field">
                    <input type="text" required>
                    <label>First Name</label>
                </div>
                <div class="input-field">
                    <input type="password" required>
                    <label>Create password</label>
                </div>
                <div class="policy-text">
                    <input type="checkbox" id="policy">
                    <label for="policy">
                        I agree the
                        <a href="#" class="option">Terms & Conditions</a>
                    </label>
                </div>
                <button type="submit" value="submit">Sign Up</button>
            </form>
            <div class="bottom-link">
                Already have an account?
                <a href="#" id="login-link">Login</a>
            </div>
        </div>
    </div>
</div>