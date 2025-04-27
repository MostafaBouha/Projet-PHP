<!DOCTYPE html>
<html>
<head>
    <title>EducatifEnfant</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="page-container">
        <header>
            <h2 class="logo">
                <a href="accueil.php">
                    <img src="accueil/logo.png" alt="Logo EducatifEnfant">
                </a>
            </h2>
            <nav class="navigation">
                <a href="alphabet.php"><ion-icon name="book-outline"></ion-icon> Alphabet</a>
                <a href="colors.php"><ion-icon name="color-palette-outline"></ion-icon> Colors</a>
                <a href="numbers.php"><ion-icon name="calculator-outline"></ion-icon> Numbers</a>
                <a href="animals.php"><ion-icon name="paw-outline"></ion-icon> Animals</a>
                <button class="btnLogin-popup"><ion-icon name="log-in-outline"></ion-icon> Login</button>
            </nav>
        </header>

        <main class="login-main">
            <div class="wrapper">
                <span class="icon-close"><ion-icon name="close"></ion-icon></span>
                <div class="form-box login">
                    <h2>Login</h2>
                    <form action="process-login.php" method="POST">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="usernameemail" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" name="submit" class="btn">Login</button>
                        <div class="login-register">
                            <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                        </div>
                    </form>
                </div>

                <div class="form-box register">
                    <h2>Registration</h2>
                    <form action="process-register.php" method="POST">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <input type="text" name="username" required>
                            <label>Username</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox" required>I agree to the terms</label>
                        </div>
                        <button type="submit" name="submit" class="btn">Register</button>
                        <div class="login-register">
                            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="accueil/logo.png" alt="Logo EducatifEnfant">
                    <p>Learning through play</p>
                </div>
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <a href="accueil.php">Home</a>
                    <a href="alphabet.php">Alphabet</a>
                    <a href="numbers.php">Numbers</a>
                    <a href="colors.php">Colors</a>
                </div>
                <div class="footer-contact">
                    <h4>Contact</h4>
                    <p>contact@educatifenfant.com</p>
                    <div class="social-icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-youtube"></ion-icon></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 EducatifEnfant - All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>