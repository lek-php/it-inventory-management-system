import { toaster } from '../app.js';

const assignedTo = document.getElementById('users');
const previousAssignedTo = assignedTo.dataset.selected;

const users = await (await fetch('/api/users/all')).json();
users.forEach(user => {
    const option = document.createElement('option');

    option.value = user.employee_id;
    option.textContent = user.name;

    if (user.employee_id === previousAssignedTo) {
        option.selected = true;
    }

    assignedTo.appendChild(option);
});

toaster('toast', 'closeToast');



