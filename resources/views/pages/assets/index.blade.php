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
            <p class="mt-2 text-3xl font-extrabold" id="total-assets-count">{{ $AssetsCount ?? 0 }}</p>
            <p class="mt-2 text-xs text-slate-500">Across 6 categories</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                Available
            </p>
            <p class="mt-2 text-3xl font-extrabold text-signal" id="assets-available-count">{{
                $byCategoryCount['Available'] ?? 0 }}</p>
            <p class="mt-2 text-xs text-slate-500">Ready for allocation</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                For Maintenance
            </p>
            <p class="mt-2 text-3xl font-extrabold text-amber" id="assets-for_maintenance-count">{{
                $byCategoryCount['For maintenance'] ?? 0 }}</p>
            <p class="mt-2 text-xs text-slate-500">Awaiting for maintenance</p>
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
                <option>Desktop</option>
                <option>Tablet</option>
                <option>Printer</option>
                <option>Peripherals</option>
                <option>Network</option>
            </select><select
                class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm font-semibold outline-none focus:border-signal"
                id="status">
                <option value="all">All statuses</option>
                <option>Available</option>
                <option>Assigned</option>
                <option>In repair</option>
                <option>For maintenance</option>
                <option>Not good</option>
                <option>For disposal</option>
                <option>Disposed</option>
            </select><button
                class="rounded-xl border border-slate-200 px-4 py-2.5 text-sm font-bold text-slate-600 hover:bg-slate-50"
                id="clear" type="button">
                Clear filters
            </button>
        </div>
        <div class="mt-4 flex flex-wrap items-center gap-2 text-xs">
            <span class="font-bold text-slate-400">Quick filters:</span>
            <button class="quick rounded-full bg-emerald-50 px-3 py-1.5 font-bold text-signal" data-status="Available"
                type="button">
                Available
            </button>
            <button class="quick rounded-full bg-amber-50 px-3 py-1.5 font-bold text-amber-700" data-status="In repair"
                type="button">
                Needs repair
            </button>
            <button class="quick rounded-full bg-slate-100 px-3 py-1.5 font-bold text-slate-600"
                data-status="For maintenance" type="button">
                For maintenance
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

    @vite('resources/js/assets/index.js')

</x-layouts.app>