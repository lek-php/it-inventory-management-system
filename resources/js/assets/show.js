const warrantyProgress = document.getElementById('warrantyProgress');
const warrantyProgressBar = document.getElementById('warrantyProgressBar');

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

    // Set width
    warrantyProgressBar.style.width = `${percentage}%`;

    // Set color
    if (daysLeft < 0) {
        // Expired
        warrantyProgressBar.classList.add('bg-slate-400');

    } else if (daysLeft <= 30) {
        // 30 days or less
        warrantyProgressBar.classList.add('bg-amber-500');

    } else {
        // More than 30 days
        warrantyProgressBar.classList.add('bg-signal');
    }
}
