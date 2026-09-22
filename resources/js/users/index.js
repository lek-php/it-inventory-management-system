import { timeAgo } from "../app";

const users = await (await fetch('/api/users/all')).json();


const rows = document.getElementById('peopleRows');
const perPage = 5;

let filtered = [...users];
let page = 1;
let sortKey = 'activityOrder';
let sortDirection = 1;


// --------------------------------------------------
// Status Helpers
// --------------------------------------------------

const statusBadge = (person) => {
    if (person.state === 'assigned') {
        return 'bg-emerald-50 text-signal';
    }

    if (person.state === 'return') {
        return 'bg-rose-50 text-rose-600';
    }

    return 'bg-amber-50 text-amber-700';
};

const statusLabel = (person) => {
    if (person.state === 'assigned') {
        return 'Assigned';
    }

    if (person.state === 'return') {
        return 'Return due';
    }

    return 'No assets';
};


// --------------------------------------------------
// Filtering & Sorting
// --------------------------------------------------

function applyFilters() {
    const query = document
        .getElementById('search')
        .value
        .toLowerCase();

    const filter = document.getElementById('filter').value;

    filtered = users
        .filter((person) => {
            const matchesFilter =
                filter === 'all' || person.state === filter;

            const matchesSearch = Object
                .values(person)
                .join(' ')
                .toLowerCase()
                .includes(query);

            return matchesFilter && matchesSearch;
        })
        .sort((a, b) => {
            if (typeof a[sortKey] === 'number') {
                return (
                    (a[sortKey] - b[sortKey]) *
                    sortDirection
                );
            }

            return (
                String(a[sortKey]).localeCompare(
                    String(b[sortKey])
                ) * sortDirection
            );
        });

    page = 1;

    render();
}


// --------------------------------------------------
// Render Table
// --------------------------------------------------

function render() {
    const total = filtered.length;

    const pages = Math.max(
        1,
        Math.ceil(total / perPage)
    );

    const start = (page - 1) * perPage;

    const shown = filtered.slice(
        start,
        start + perPage
    );

    document.getElementById('resultCount').textContent = total;

    rows.innerHTML = shown
        .map(
            (person) => `
                <tr class="hover:bg-slate-50">
                    <td class="py-4">
                        <div class="flex items-center gap-3">
                            <span
                                class="grid h-9 w-9 place-items-center rounded-full bg-slate-100 text-xs font-extrabold text-slate-600"
                            >
                                ${person.name}
                            </span>

                        </div>
                    </td>

                    <td class="py-4 text-slate-600">
                        ${person.department.name}
                    </td>

                    <td class="py-4">
                        <span class="block font-semibold text-slate-700">
                            ${person.label}
                        </span>

                        <span class="mono text-xs text-slate-400">
                            ${person.assets}
                        </span>
                    </td>

                    <td class="py-4">
                        <span
                            class="rounded-full px-2.5 py-1 text-xs font-bold ${statusBadge(person)}"
                        >
                            ${statusLabel(person)}
                        </span>
                    </td>

                    <td class="py-4 text-right text-slate-500">
                         ${timeAgo(person.updated_at)}
                    </td>
                </tr>
            `
        )
        .join('')
        ||
        `
            <tr>
                <td
                    class="py-10 text-center text-slate-500"
                    colspan="5"
                >
                    No users match your search.
                </td>
            </tr>
        `;


    // --------------------------------------------------
    // Pagination Summary
    // --------------------------------------------------

    document.getElementById('pageSummary').innerHTML =
        total
            ? `
                Showing
                <b class="text-ink">
                    ${start + 1}–${Math.min(
                start + perPage,
                total
            )}
                </b>
                of
                <b class="text-ink">${total}</b>
                users
            `
            : 'No people found';


    // --------------------------------------------------
    // Previous / Next Buttons
    // --------------------------------------------------

    document.getElementById('previous').disabled =
        page === 1;

    document.getElementById('next').disabled =
        page === pages;


    // --------------------------------------------------
    // Page Numbers
    // --------------------------------------------------

    document.getElementById('pageNumbers').innerHTML =
        Array.from(
            { length: pages },
            (_, index) => `
                <button
                    class="rounded-lg px-3 py-2 font-bold ${page === index + 1
                    ? 'bg-ink text-white'
                    : 'text-slate-600 hover:bg-slate-100'
                }"
                    data-page="${index + 1}"
                    type="button"
                >
                    ${index + 1}
                </button>
            `
        ).join('');


    // --------------------------------------------------
    // Page Number Events
    // --------------------------------------------------

    document
        .querySelectorAll('[data-page]')
        .forEach((button) => {
            button.addEventListener('click', () => {
                page = Number(button.dataset.page);
                render();
            });
        });
}


// --------------------------------------------------
// Search
// --------------------------------------------------

document
    .getElementById('search')
    .addEventListener('input', applyFilters);


// --------------------------------------------------
// Filter
// --------------------------------------------------

document
    .getElementById('filter')
    .addEventListener('change', applyFilters);


// --------------------------------------------------
// Previous Page
// --------------------------------------------------

document
    .getElementById('previous')
    .addEventListener('click', () => {
        if (page > 1) {
            page--;
            render();
        }
    });


// --------------------------------------------------
// Next Page
// --------------------------------------------------

document
    .getElementById('next')
    .addEventListener('click', () => {
        if (page < Math.ceil(filtered.length / perPage)) {
            page++;
            render();
        }
    });


// --------------------------------------------------
// Sorting
// --------------------------------------------------

document
    .querySelectorAll('.sort')
    .forEach((button) => {
        button.addEventListener('click', () => {
            sortKey = button.dataset.key;
            sortDirection *= -1;

            applyFilters();
        });
    });


// --------------------------------------------------
// Initial Render
// --------------------------------------------------

applyFilters();
render();
