import { toaster } from '../app.js';
toaster('toast', 'closeToast');

// Get warranty elements
const warrantyProgress = document.getElementById('warrantyProgress');
const warrantyProgressBar = document.getElementById('warrantyProgressBar');
const warrantyBadge = document.getElementById('warrantyBadge');


// Calculate warranty progress and update the progress bar
if (warrantyProgress && warrantyProgressBar) {

    const purchaseDate = new Date(
        warrantyProgress.dataset.purchaseDate
    );

    const expirationDate = new Date(
        warrantyProgress.dataset.expirationDate
    );

    const today = new Date();


    // Calculate total warranty duration
    const totalDays =
        (expirationDate - purchaseDate) / (1000 * 60 * 60 * 24);


    // Calculate elapsed days
    const elapsedDays =
        (today - purchaseDate) / (1000 * 60 * 60 * 24);


    // Calculate progress percentage
    let percentage = (elapsedDays / totalDays) * 100;


    // Keep percentage between 0 and 100
    percentage = Math.min(100, Math.max(0, percentage));


    // Calculate remaining days
    const daysLeft =
        (expirationDate - today) / (1000 * 60 * 60 * 24);


    // Set progress bar width
    warrantyProgressBar.style.width = `${percentage}%`;


    // Remove previous colors
    warrantyProgressBar.classList.remove(
        'bg-signal',
        'bg-amber-500',
        'bg-red-500',
        'bg-slate-400'
    );


    if (warrantyBadge) {

        // Remove previous badge colors
        warrantyBadge.classList.remove(
            'bg-emerald-50',
            'text-signal',
            'bg-amber-50',
            'text-amber-600',
            'bg-red-50',
            'text-red-600'
        );
    }


    // Determine warranty status
    if (daysLeft < 0) {

        // ==========================================
        // EXPIRED
        // ==========================================

        warrantyProgressBar.classList.add('bg-red-500');


        if (warrantyBadge) {
            warrantyBadge.classList.add(
                'bg-red-50',
                'text-red-600'
            );
        }

    } else if (daysLeft <= 30) {

        // ==========================================
        // 30 DAYS OR LESS
        // ==========================================

        warrantyProgressBar.classList.add('bg-amber-500');


        if (warrantyBadge) {
            warrantyBadge.classList.add(
                'bg-amber-50',
                'text-amber-600'
            );
        }

    } else {

        // ==========================================
        // MORE THAN 30 DAYS
        // ==========================================

        warrantyProgressBar.classList.add('bg-signal');


        if (warrantyBadge) {
            warrantyBadge.classList.add(
                'bg-emerald-50',
                'text-signal'
            );
        }
    }
}

const assignUserBtn = document.getElementById('assign-user-btn');
const assetModal = document.getElementById('assetModal');
assignUserBtn.addEventListener('click', function () {
    assetModal.classList.remove('hidden');
});

const closeAssignAssetModalButtons = document.querySelectorAll('.closeAssignAssetModal');
closeAssignAssetModalButtons.forEach(button => {
    button.addEventListener('click', function () {
        const assetModal = document.getElementById('assetModal');
        if (assetModal) {
            assetModal.classList.add('hidden');
        }
    });
});

// Get user list and populate the select dropdown
const assignedTo = document.getElementById('users');
const users = await (await fetch('/api/users/all')).json();
users.forEach(user => {
    const option = document.createElement('option');

    option.value = user.employee_id;
    option.textContent = user.name;

    assignedTo.appendChild(option);
});

