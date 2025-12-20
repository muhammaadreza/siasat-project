const passwordInput = document.getElementById('password');
const passwordToggle = document.querySelector('.toggle-password');
const passwordToggleIcon = document.getElementById('passwordToggleIcon');

passwordToggle.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    if (type === 'password') {
        passwordToggleIcon.classList.remove('ri-eye-off-line');
        passwordToggleIcon.classList.add('ri-eye-line');
    } else {
        passwordToggleIcon.classList.remove('ri-eye-line');
        passwordToggleIcon.classList.add('ri-eye-off-line');
    }
});

if (localStorage.getItem('dark-theme')) {
    document.body.classList.add('dark-theme');
}