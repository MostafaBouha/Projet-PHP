const wrapper = document.querySelector('.wrapper');
const loginForm = document.querySelector('.form-box.login');
const registerForm = document.querySelector('.form-box.Register');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerForm.style.display = 'none';

registerLink.addEventListener('click', () => {
    registerForm.style.display = 'block'; 
    loginForm.style.display = 'none'; 
});

loginLink.addEventListener('click', () => {
    loginForm.style.display = 'block'; 
    registerForm.style.display = 'none'; 
});

btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    loginForm.style.display = 'block'; 
    registerForm.style.display = 'none';
});
iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
});
document.querySelector('.form-box.login form').addEventListener('submit', (event) => {
    event.preventDefault();

    let email = document.querySelector('.form-box.login input[type="email"]').value;
    let password = document.querySelector('.form-box.login input[type="password"]').value;

    fetch('process-login.php', {
        method: 'POST',
        body: new URLSearchParams({ usernameemail: email, password: password }),
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if (data.trim() === "Connexion réussie") {
            window.location.href = "accueil.php"; 
        } else {
            alert("Échec de la connexion : " + data);
        }
    });
});

