<x-layouts.app>
    <header class="flex flex-wrap items-center justify-between gap-4">
        <a class="text-sm font-bold text-slate-500 hover:text-ink" href="it-inventory-home.html">← Back to
            overview</a><span class="mono text-xs font-medium uppercase tracking-[.14em] text-signal">IT assets
            inventory record</span>
    </header>
    <section class="mt-10">
        <div class="flex flex-wrap items-end justify-between gap-5">
            <div>
                <p class="text-sm font-bold text-signal">ASSET MANAGEMENT</p>
                <h1 class="mt-2 text-3xl font-extrabold tracking-tight sm:text-4xl">
                    IT assets
                </h1>
                <p class="mt-3 text-sm text-slate-500">
                    Browse, locate, and manage every device in your inventory.
                </p>
            </div>
            <a class="rounded-xl bg-ink px-5 py-3 text-sm font-extrabold text-white transition hover:bg-slate-700"
                href="/assets/create">+ Add asset</a>
        </div>
    </section>
    <section class="mt-8 grid gap-4 sm:grid-cols-3">
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                All assets
            </p>
            <p class="mt-2 text-3xl font-extrabold">1,284</p>
            <p class="mt-2 text-xs text-slate-500">Across 8 categories</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                Available
            </p>
            <p class="mt-2 text-3xl font-extrabold text-signal">142</p>
            <p class="mt-2 text-xs text-slate-500">Ready for allocation</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                Unassigned
            </p>
            <p class="mt-2 text-3xl font-extrabold text-amber">18</p>
            <p class="mt-2 text-xs text-slate-500">Awaiting an owner</p>
        </article>
    </section>
    <section class="mt-8 rounded-2xl bg-white p-5 shadow-soft sm:p-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="text-lg font-extrabold">Asset directory</h2>
                <p class="mt-1 text-sm text-slate-500">
                    <span id="count">6</span> of 1,284 assets shown
                </p>
            </div>
            <div class="flex items-center rounded-xl bg-slate-100 p-1">
                <button class="rounded-lg bg-white px-3 py-2 text-xs font-bold shadow-sm" id="tableView" type="button">
                    ☷ Table</button><button class="rounded-lg px-3 py-2 text-xs font-bold text-slate-500" id="cardView"
                    type="button">
                    ▦ Cards
                </button>
            </div>
        </div>
        <div class="mt-6 grid gap-3 lg:grid-cols-[minmax(0,1fr)_auto_auto_auto]">
            <label class="relative block"><span class="absolute left-4 top-3 text-slate-400">⌕</span><input
                    class="w-full rounded-xl border border-slate-200 py-2.5 pl-10 pr-4 text-sm outline-none placeholder:text-slate-400 focus:border-signal"
                    id="search" placeholder="Search name, asset tag, serial number…" /></label><select
                class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm font-semibold outline-none focus:border-signal"
                id="category">
                <option value="all">All categories</option>
                <option>Laptop</option>
                <option>Monitor</option>
                <option>Mobile device</option>
                <option>Network</option>
            </select><select
                class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm font-semibold outline-none focus:border-signal"
                id="status">
                <option value="all">All statuses</option>
                <option>In use</option>
                <option>Available</option>
                <option>In repair</option>
            </select><button
                class="rounded-xl border border-slate-200 px-4 py-2.5 text-sm font-bold text-slate-600 hover:bg-slate-50"
                id="clear" type="button">
                Clear filters
            </button>
        </div>
        <div class="mt-4 flex flex-wrap items-center gap-2 text-xs">
            <span class="font-bold text-slate-400">Quick filters:</span><button
                class="quick rounded-full bg-emerald-50 px-3 py-1.5 font-bold text-signal" data-status="Available"
                type="button">
                Available</button><button class="quick rounded-full bg-amber-50 px-3 py-1.5 font-bold text-amber-700"
                data-status="In repair" type="button">
                Needs repair</button><button
                class="quick rounded-full bg-slate-100 px-3 py-1.5 font-bold text-slate-600" data-status="Unassigned"
                type="button">
                Unassigned
            </button>
        </div>
        <div class="mt-6 hidden rounded-xl bg-emerald-50 px-4 py-3 text-sm font-semibold text-signal" id="bulk">
            <span id="selected">0</span> assets selected
            <button class="ml-4 underline" type="button">Assign owner</button><button class="ml-4 underline"
                type="button">Export</button>
        </div>
        <div class="mt-5 overflow-x-auto" id="tableWrap">
            <table class="w-full min-w-[820px] text-left text-sm">
                <thead class="border-b border-slate-100 text-xs uppercase tracking-wider text-slate-400">
                    <tr>
                        <th class="w-10 pb-3">
                            <input class="h-4 w-4 accent-signal" id="selectAll" aria-label="Select all assets"
                                type="checkbox" />
                        </th>
                        <th class="pb-3 font-semibold">
                            <button class="sort font-semibold" data-key="name" type="button">
                                Asset ↕
                            </button>
                        </th>
                        <th class="pb-3 font-semibold">
                            <button class="sort font-semibold" data-key="category" type="button">
                                Category ↕
                            </button>
                        </th>
                        <th class="pb-3 font-semibold">Assigned to</th>
                        <th class="pb-3 font-semibold">
                            <button class="sort font-semibold" data-key="status" type="button">
                                Status ↕
                            </button>
                        </th>
                        <th class="pb-3 text-right font-semibold">Last updated</th>
                        <th class="w-10"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100" id="rows"></tbody>
            </table>
        </div>
        <div class="mt-5 hidden grid gap-4 sm:grid-cols-2 xl:grid-cols-3" id="cards"></div>
        <div class="mt-6 flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 pt-5 text-sm">
            <p class="text-slate-500">
                Showing <b class="text-ink">1–6</b> of
                <b class="text-ink">1,284</b> assets
            </p>
            <div class="flex gap-2">
                <button class="rounded-lg border border-slate-200 px-3 py-2 font-bold text-slate-400" disabled
                    type="button">
                    ← Previous</button><button
                    class="rounded-lg border border-slate-200 px-3 py-2 font-bold text-slate-600 hover:bg-slate-50"
                    type="button">
                    Next →
                </button>
            </div>
        </div>
    </section>

    <script>
        const assets = [{
                name: "MacBook Pro 14-inch",
                tag: "AT-2048",
                serial: "C02XX8JCLVDD",
                category: "Laptop",
                owner: "Maya Chen",
                status: "In use",
                updated: "Today",
            },
            {
                name: "Dell UltraSharp 27",
                tag: "AT-2047",
                serial: "CN0D43A3A5",
                category: "Monitor",
                owner: "Unassigned",
                status: "Available",
                updated: "Today",
            },
            {
                name: "iPhone 16 Pro",
                tag: "AT-2046",
                serial: "F2LQX5CGYL",
                category: "Mobile device",
                owner: "Noah Williams",
                status: "In use",
                updated: "Yesterday",
            },
            {
                name: "ThinkPad X1 Carbon",
                tag: "AT-2041",
                serial: "PF43XLE8",
                category: "Laptop",
                owner: "Priya Shah",
                status: "In repair",
                updated: "2 days ago",
            },
            {
                name: "Cisco Meraki MR46",
                tag: "AT-2023",
                serial: "Q2TD-HNQG-BVRZ",
                category: "Network",
                owner: "IT Operations",
                status: "In use",
                updated: "3 days ago",
            },
            {
                name: "MacBook Air 15-inch",
                tag: "AT-2018",
                serial: "C02ZC2TNLVDM",
                category: "Laptop",
                owner: "Unassigned",
                status: "Available",
                updated: "4 days ago",
            },
        ];
        let current = [...assets],
            sortDirection = 1;
        const rows = document.getElementById("rows"),
            cards = document.getElementById("cards"),
            count = document.getElementById("count");
        const badge = (s) =>
            s === "Available" ?
            "bg-emerald-50 text-signal" :
            s === "In repair" ?
            "bg-amber-50 text-amber-700" :
            "bg-sky-50 text-sky-700";

        function render() {
            const q = document.getElementById("search").value.toLowerCase(),
                cat = document.getElementById("category").value,
                stat = document.getElementById("status").value;
            current = assets.filter(
                (a) =>
                (cat === "all" || a.category === cat) &&
                (stat === "all" ||
                    a.status === stat ||
                    (stat === "Unassigned" && a.owner === "Unassigned")) &&
                Object.values(a).join(" ").toLowerCase().includes(q),
            );
            count.textContent = current.length;
            rows.innerHTML = current
                .map(
                    (a, i) =>
                    `<tr class="hover:bg-slate-50"><td class="py-4"><input class="item h-4 w-4 accent-signal" data-index="${i}" aria-label="Select ${a.name}" type="checkbox"></td><td class="py-4"><b class="block">${a.name}</b><span class="mono text-xs text-slate-400">${a.tag}</span></td><td class="py-4 text-slate-600">${a.category}</td><td class="py-4 ${a.owner === "Unassigned" ? "text-amber-700" : "text-slate-600"}">${a.owner}</td><td class="py-4"><span class="rounded-full px-2.5 py-1 text-xs font-bold ${badge(a.status)}">${a.status}</span></td><td class="py-4 text-right text-slate-500">${a.updated}</td><td class="py-4 text-right"><button class="font-bold text-slate-400 hover:text-signal" aria-label="More actions for ${a.name}" type="button">•••</button></td></tr>`,
                )
                .join("");
            cards.innerHTML = current
                .map(
                    (a) =>
                    `<article class="rounded-xl border border-slate-100 shadow p-5"><div class="flex justify-between gap-3"><div><h3 class="font-extrabold">${a.name}</h3><p class="mono mt-1 text-xs text-slate-400">${a.tag}</p></div><span class="rounded-full px-2.5 py-1 text-xs font-bold ${badge(a.status)}">${a.status}</span></div><dl class="mt-5 grid grid-cols-2 gap-4 text-sm"><div><dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Category</dt><dd class="mt-1 font-semibold">${a.category}</dd></div><div><dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Owner</dt><dd class="mt-1 font-semibold">${a.owner}</dd></div></dl><button class="mt-5 text-sm font-bold text-signal" type="button">View asset →</button></article>`,
                )
                .join("");
            bindChecks();
        }

        function bindChecks() {
            document
                .querySelectorAll(".item")
                .forEach((x) => x.addEventListener("change", updateBulk));
            updateBulk();
        }

        function updateBulk() {
            const n = document.querySelectorAll(".item:checked").length;
            document.getElementById("selected").textContent = n;
            document.getElementById("bulk").classList.toggle("hidden", !n);
        }
        ["search", "category", "status"].forEach((id) =>
            document
            .getElementById(id)
            .addEventListener(id === "search" ? "input" : "change", render),
        );
        document.querySelectorAll(".quick").forEach((b) =>
            b.addEventListener("click", () => {
                document.getElementById("status").value = b.dataset.status;
                render();
            }),
        );
        document.getElementById("clear").addEventListener("click", () => {
            document.getElementById("search").value = "";
            document.getElementById("category").value = "all";
            document.getElementById("status").value = "all";
            render();
        });
        document.getElementById("selectAll").addEventListener("change", (e) => {
            document
                .querySelectorAll(".item")
                .forEach((x) => (x.checked = e.target.checked));
            updateBulk();
        });
        document.querySelectorAll(".sort").forEach((b) =>
            b.addEventListener("click", () => {
                const key = b.dataset.key;
                assets.sort((a, c) => a[key].localeCompare(c[key]) * sortDirection);
                sortDirection *= -1;
                render();
            }),
        );
        document.getElementById("tableView").addEventListener("click", () => {
            document.getElementById("tableWrap").classList.remove("hidden");
            cards.classList.add("hidden");
        });
        document.getElementById("cardView").addEventListener("click", () => {
            document.getElementById("tableWrap").classList.add("hidden");
            cards.classList.remove("hidden");
        });
        render();
    </script>

</x-layouts.app>