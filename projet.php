<!DOCTYPE html>
<html>
<head>
<title>EducatifEnfant</title>
<link rel="stylesheet" href="style/style.css">
<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
            <h2 class="logo">
              <img src="accueil/logo.png" alt="Logo">
            </h2>
        <nav class ="navigation">
            <a href="process-login.php">Accueil</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>
    <div class="wrapper">
        <span class="icon-close"><ion-icon
        name="close"></ion-icon></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="process-login.php" method="POST">
                <div class="input-box">
                    
                    <span class="icon">
                        <ion-icon name="mail">  
                        </ion-icon></span>
                    <input type="email" name="usernameemail" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" name="submit" class="btn">Login</button>
                <div>
                    <p>Don't have an account ? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box Register">
            <h2>Registration</h2>
            <form action="process-register.php" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="usernameemail" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        I agree to the terms & conditions</label>
                        <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Register</button>
                <div>
                    <p>Already have an account ? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>

</body>
</html>