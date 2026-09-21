
const login = document.getElementById('isLoginUser');
const password = document.getElementById('password');

login.addEventListener('change', () => {
    password.disabled = !login.checked;
    password.required = login.checked;

    password.placeholder = login.checked
        ? 'Create a secure password'
        : 'No password set';
});

