// console.log('Hello world! This is the Information Management System.');
import { timeAgo, badge } from '../app.js';

const assets = await (await fetch('/api/assets/all')).json();

let current = [...assets];
let sortDirection = 1;
let page = 1;

const perPage = 4;

const rows = document.getElementById('rows');
const cards = document.getElementById('cards');
const count = document.getElementById('count');

function render() {
    const q = document.getElementById('search').value.toLowerCase();
    const cat = document.getElementById('category').value;
    const stat = document.getElementById('status').value;

    current = assets.filter(
        (a) =>
            (cat === 'all' || a.category === cat) &&
            (
                stat === 'all' ||
                a.status === stat ||
                (stat === 'Unassigned' && a.owner === 'Unassigned')
            ) &&
            Object.values(a).join(' ').toLowerCase().includes(q),
    );

    count.textContent = current.length;

    const total = current.length;
    const pages = Math.max(1, Math.ceil(total / perPage));
    const start = (page - 1) * perPage;
    const shown = current.slice(start, start + perPage);

    rows.innerHTML = shown
        .map(
            (a, i) => `
                <tr class="hover:bg-slate-50">
                    <td class="py-4">
                        <input
                            class="item h-4 w-4 accent-signal"
                            data-index="${i}"
                            aria-label="Select ${a.asset_name}"
                            type="checkbox"
                        >
                    </td>

                    <td class="py-4">
                        <b class="block">${a.asset_name}</b>
                        <span class="mono text-xs text-slate-400">
                            ${a.tag}
                        </span>
                    </td>

                    <td class="py-4 text-slate-600">
                        ${a.category}
                    </td>

                    <td class="py-4 ${a.assigned_to === null
                    ? 'text-amber-700'
                    : 'text-slate-600'
                }">
                        ${a.assigned_to ?? 'Unassigned'}
                    </td>

                    <td class="py-4">
                        <span
                            class="rounded-full px-2.5 py-1 text-xs font-bold ${badge(
                    a.status,
                )}"
                        >
                            ${a.status}
                        </span>
                    </td>

                    <td class="py-4 text-right text-slate-500">
                        ${timeAgo(a.updated_at)}
                    </td>

                    <td class="py-4 text-right">
                        <a href="${"assets/asset/" + a.tag}"
                            class="font-bold text-slate-400 hover:text-signal"
                            aria-label="More actions for ${a.name}"
                            type="button"
                        >
                            •••
                        </a>
                    </td>
                </tr>
            `,
        )
        .join('');

    cards.innerHTML = shown
        .map(
            (a) => `
                <article class="rounded-xl border border-slate-100 p-5">
                    <div class="flex justify-between gap-3">
                        <div>
                            <h3 class="font-extrabold">
                                ${a.asset_name}
                            </h3>

                            <p class="mono mt-1 text-xs text-slate-400">
                                ${a.tag}
                            </p>
                        </div>

                        <span
                            class="rounded-full px-2.5 py-1 text-xs font-bold flex items-center justify-center ${badge(a.status)}">
                            <p>${a.status}</p>
                        </span>
                    </div>

                    <dl class="mt-5 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <dt
                                class="text-xs font-bold uppercase tracking-wider text-slate-400"
                            >
                                Category
                            </dt>

                            <dd class="mt-1 font-semibold">
                                ${a.category}
                            </dd>
                        </div>

                        <div>
                            <dt
                                class="text-xs font-bold uppercase tracking-wider text-slate-400"
                            >
                                Owner
                            </dt>

                            <dd class="mt-1 font-semibold ${a.assigned_to === 'null' ? 'text-amber-700' : 'text-slate-600'}">
                                ${a.assigned_to ?? 'Unassigned'}
                            </dd>
                        </div>
                    </dl>

                    <a
                        href="${"/assets/asset/" + a.tag}"
                        class="mt-5 text-sm font-bold text-signal"
                        type="button"
                    >
                        View asset →
                    </a>
                </article>
            `,
        )
        .join('');

    document.getElementById('pageSummary').innerHTML = total
        ? `Showing <b class="text-ink">${start + 1}–${Math.min(
            start + perPage,
            total,
        )}</b> of <b class="text-ink">${total}</b> assets`
        : 'No assets found';

    document.getElementById('previous').disabled = page === 1;
    document.getElementById('next').disabled = page === pages;

    document.getElementById('pageNumbers').innerHTML = Array.from(
        { length: pages },
        (_, i) => `
            <button
                class="rounded-lg px-3 py-2 font-bold ${page === i + 1
                ? 'bg-ink text-white'
                : 'text-slate-600 hover:bg-slate-100'
            }"
                data-page="${i + 1}"
                type="button"
            >
                ${i + 1}
            </button>
        `,
    ).join('');

    document.querySelectorAll('[data-page]').forEach((button) => {
        button.addEventListener('click', () => {
            page = Number(button.dataset.page);
            render();
        });
    });

    bindChecks();
}

function bindChecks() {
    document
        .querySelectorAll('.item')
        .forEach((x) => x.addEventListener('change', updateBulk));

    updateBulk();
}

function updateBulk() {
    const n = document.querySelectorAll('.item:checked').length;

    document.getElementById('selected').textContent = n;

    document.getElementById('bulk').classList.toggle('hidden', !n);
}

function applyFilters() {
    page = 1;
    render();
}

['search', 'category', 'status'].forEach((id) => {
    document
        .getElementById(id)
        .addEventListener(
            id === 'search' ? 'input' : 'change',
            applyFilters,
        );
});

document.querySelectorAll('.quick').forEach((b) => {
    b.addEventListener('click', () => {
        document.getElementById('status').value = b.dataset.status;
        applyFilters();
    });
});

document.getElementById('clear').addEventListener('click', () => {
    document.getElementById('search').value = '';
    document.getElementById('category').value = 'all';
    document.getElementById('status').value = 'all';

    applyFilters();
});

document.getElementById('selectAll').addEventListener('change', (e) => {
    document
        .querySelectorAll('.item')
        .forEach((x) => (x.checked = e.target.checked));

    updateBulk();
});

document.querySelectorAll('.sort').forEach((b) => {
    b.addEventListener('click', () => {
        const key = b.dataset.key;

        assets.sort(
            (a, c) =>
                a[key].localeCompare(c[key]) * sortDirection,
        );

        sortDirection *= -1;
        page = 1;

        render();
    });
});

document.getElementById('previous').addEventListener('click', () => {
    if (page > 1) {
        page--;
        render();
    }
});

document.getElementById('next').addEventListener('click', () => {
    if (page < Math.ceil(current.length / perPage)) {
        page++;
        render();
    }
});

document.getElementById('tableView').addEventListener('click', () => {
    document.getElementById('tableWrap').classList.remove('hidden');
    cards.classList.add('hidden');
});

document.getElementById('cardView').addEventListener('click', () => {
    document.getElementById('tableWrap').classList.add('hidden');
    cards.classList.remove('hidden');
});

render();
