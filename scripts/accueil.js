const loginForm = document.querySelector('.form-box.login');
const loginLink = document.querySelector('.login-link');
const btnPopup = document.querySelector('.btnLogin-popup');
loginLink.addEventListener('click', () => {
    loginForm.style.display = 'block'; 
    registerForm.style.display = 'none'; 
});