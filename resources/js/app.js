console.log('Hello world! This is the Information Management System.');
console.log('Hello world!');

const modal = document.getElementById('modal');
document.getElementById('addAsset').addEventListener('click', () => modal.classList.replace('hidden', 'flex'));
document.getElementById('closeModal').addEventListener('click', () => modal.classList.replace('flex', 'hidden'));
document.getElementById('assetForm').addEventListener('submit', (e) => { e.preventDefault(); modal.classList.replace('flex', 'hidden'); document.getElementById('addAsset').textContent = '✓ Asset created'; setTimeout(() => document.getElementById('addAsset').textContent = '+ Add asset', 1800); });
document.getElementById('refresh').addEventListener('click', (e) => { e.currentTarget.textContent = '✓ Updated just now'; setTimeout(() => e.currentTarget.textContent = '↻ Refresh data', 1800); });
