const people = [
    {
        name: 'Maya Chen',
        initials: 'MC',
        department: 'Product',
        assets: 'MacBook Pro 14 · AT-2048',
        state: 'assigned',
        label: '2 assets',
        activity: 'Today',
        activityOrder: 1
    },
    {
        name: 'Noah Williams',
        initials: 'NW',
        department: 'Engineering',
        assets: 'iPhone 16 Pro · AT-2046',
        state: 'assigned',
        label: '3 assets',
        activity: 'Today',
        activityOrder: 1
    },
    {
        name: 'Priya Shah',
        initials: 'PS',
        department: 'Finance',
        assets: 'ThinkPad X1 · AT-2041',
        state: 'assigned',
        label: '1 asset',
        activity: 'Yesterday',
        activityOrder: 2
    },
    {
        name: 'Lucas Brown',
        initials: 'LB',
        department: 'Sales',
        assets: 'No assigned assets',
        state: 'unassigned',
        label: 'None',
        activity: '2 days ago',
        activityOrder: 3
    },
    {
        name: 'Ava Patel',
        initials: 'AP',
        department: 'Operations',
        assets: 'MacBook Air · AT-2009',
        state: 'return',
        label: 'Return due',
        activity: '3 days ago',
        activityOrder: 4
    },
    {
        name: 'Oliver Park',
        initials: 'OP',
        department: 'Design',
        assets: 'MacBook Pro · AT-1988',
        state: 'assigned',
        label: '2 assets',
        activity: '4 days ago',
        activityOrder: 5
    },
    {
        name: 'Sofia Rivera',
        initials: 'SR',
        department: 'Marketing',
        assets: 'Dell UltraSharp 27 · AT-2019',
        state: 'assigned',
        label: '2 assets',
        activity: '5 days ago',
        activityOrder: 6
    },
    {
        name: 'Ethan Lee',
        initials: 'EL',
        department: 'Engineering',
        assets: 'No assigned assets',
        state: 'unassigned',
        label: 'None',
        activity: '6 days ago',
        activityOrder: 7
    },
    {
        name: 'Zoe Martin',
        initials: 'ZM',
        department: 'Customer Success',
        assets: 'MacBook Air · AT-1997',
        state: 'assigned',
        label: '1 asset',
        activity: '7 days ago',
        activityOrder: 8
    },
    {
        name: 'Ben Carter',
        initials: 'BC',
        department: 'Sales',
        assets: 'iPhone 16 · AT-1989',
        state: 'assigned',
        label: '2 assets',
        activity: '8 days ago',
        activityOrder: 9
    },
    {
        name: 'Hannah Kim',
        initials: 'HK',
        department: 'Operations',
        assets: 'Return pending · AT-1981',
        state: 'return',
        label: 'Return due',
        activity: '9 days ago',
        activityOrder: 10
    },
    {
        name: 'Marcus Bell',
        initials: 'MB',
        department: 'Finance',
        assets: 'ThinkPad X1 · AT-1973',
        state: 'assigned',
        label: '1 asset',
        activity: '10 days ago',
        activityOrder: 11
    }
];

const rows = document.getElementById('peopleRows');
const perPage = 5;

let filtered = [...people];
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

    filtered = people
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
                                ${person.initials}
                            </span>

                            <b>${person.name}</b>
                        </div>
                    </td>

                    <td class="py-4 text-slate-600">
                        ${person.department}
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
                        ${person.activity}
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
                    No people match your search.
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
                people
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
// Invite Modal
// --------------------------------------------------

document
    .getElementById('invite')
    .addEventListener('click', () => {
        document
            .getElementById('modal')
            .classList
            .replace('hidden', 'grid');
    });


// --------------------------------------------------
// Close Modal
// --------------------------------------------------

document
    .getElementById('close')
    .addEventListener('click', () => {
        document
            .getElementById('modal')
            .classList
            .replace('grid', 'hidden');
    });


// --------------------------------------------------
// User Form
// --------------------------------------------------

document
    .getElementById('userForm')
    .addEventListener('submit', (event) => {
        event.preventDefault();

        document
            .getElementById('modal')
            .classList
            .replace('grid', 'hidden');

        const inviteButton =
            document.getElementById('invite');

        inviteButton.textContent = '✓ User added';

        setTimeout(() => {
            inviteButton.textContent = '+ Add user';
        }, 1600);
    });


// --------------------------------------------------
// Initial Render
// --------------------------------------------------

applyFilters();
