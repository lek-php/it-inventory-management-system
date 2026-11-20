import { toaster } from '../app.js';

const assignedTo = document.getElementById('users');
const previousAssignedTo = assignedTo.dataset.selected;
console.log(previousAssignedTo);

const users = await (await fetch('/api/users/all')).json();
console.log(users);
users.forEach(user => {
    const option = document.createElement('option');

    option.value = user.id;
    option.textContent = user.name;

    if (user.id == previousAssignedTo) {
        option.selected = true;
    }

    assignedTo.appendChild(option);
});

toaster('toast', 'closeToast');



