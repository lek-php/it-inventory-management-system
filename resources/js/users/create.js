import { toaster } from '../app.js';

const login = document.getElementById('isLoginUser');
const password = document.getElementById('password');

login.addEventListener('change', () => {
    password.disabled = !login.checked;
    password.required = login.checked;

    password.placeholder = login.checked
        ? 'Create a secure password'
        : 'No password set';
});



toaster('toast', 'closeToast');

const departmentSelect = document.getElementById('departments');
const previousSelectedDepartment = departmentSelect.dataset.selected;

const departments = await (await fetch('/api/departments/all')).json();
departments.forEach(department => {
    const option = document.createElement('option');

    option.value = department.id;
    option.textContent = department.name;

    if (department.id === previousSelectedDepartment) {
        option.selected = true;
    }

    departmentSelect.appendChild(option);
});
