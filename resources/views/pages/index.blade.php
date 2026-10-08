<x-layouts.app>
    @include('components.partials.search-bar')

    <section class="mt-10" id="overview">
        <p class="mono text-xs font-medium uppercase tracking-[.14em] text-signal">Friday, 24 July</p>
        <div class="mt-2 flex flex-wrap items-end justify-between gap-3">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Good morning, Felix.</h1>
                <p class="mt-2 text-sm text-slate-500">Here’s what needs your attention today.</p>
            </div><button class="text-sm font-bold text-signal" id="refresh" type="button">↻ Refresh
                data</button>
        </div>
    </section>

    <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <div class="flex justify-between">
                <p class="text-sm font-semibold text-slate-500">Total assets</p><span class="text-signal">▣</span>
            </div>
            <p class="mt-5 text-3xl font-extrabold">1,284</p>
            <p class="mt-2 text-xs font-semibold text-signal">↑ 12 added this month</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <div class="flex justify-between">
                <p class="text-sm font-semibold text-slate-500">In use</p><span class="text-sky-600">◉</span>
            </div>
            <p class="mt-5 text-3xl font-extrabold">1,096</p>
            <p class="mt-2 text-xs font-semibold text-slate-400">85.4% of inventory</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <div class="flex justify-between">
                <p class="text-sm font-semibold text-slate-500">Available</p><span class="text-amber">◌</span>
            </div>
            <p class="mt-5 text-3xl font-extrabold">142</p>
            <p class="mt-2 text-xs font-semibold text-amber">18 pending allocation</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <div class="flex justify-between">
                <p class="text-sm font-semibold text-slate-500">Needs attention</p><span class="text-rose-500">!</span>
            </div>
            <p class="mt-5 text-3xl font-extrabold">17</p>
            <p class="mt-2 text-xs font-semibold text-rose-500">6 require action today</p>
        </article>
    </section>

    <section class="mt-8 grid gap-6 xl:grid-cols-[1.45fr_.85fr]" aria-label="Inventory analytics">
        <article class="rounded-2xl bg-white p-6 shadow-soft">
            <div class="flex flex-wrap items-start justify-between gap-4">
                <div>
                    <h2 class="text-lg font-extrabold">Upcoming warranty expirations</h2>
                    <p class="mt-1 text-sm text-slate-500">Assets reaching the end of coverage in the next 6 months.</p>
                </div><span class="rounded-full bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-600">3 expire this
                    month</span>
            </div>
            <div class="mt-6 flex flex-wrap gap-x-5 gap-y-2 text-sm">
                <div><span class="inline-block h-2.5 w-2.5 rounded-sm bg-rose-400"></span><span
                        class="ml-2 font-semibold text-slate-600">Expiring this month</span></div>
                <div><span class="inline-block h-2.5 w-2.5 rounded-sm bg-amber"></span><span
                        class="ml-2 font-semibold text-slate-600">Future expirations</span></div>
            </div>
            <div class="mt-4 overflow-x-auto"><svg class="min-w-[550px] w-full" viewBox="0 0 680 265" role="img"
                    aria-labelledby="warrantyTitle warrantyDesc">
                    <title id="warrantyTitle">Upcoming warranty expirations by month</title>
                    <desc id="warrantyDesc">Three assets expire in October, followed by future expiration counts through
                        March.</desc>
                    <g stroke="#e2e8f0" stroke-width="1">
                        <line x1="56" y1="42" x2="655" y2="42" />
                        <line x1="56" y1="93" x2="655" y2="93" />
                        <line x1="56" y1="144" x2="655" y2="144" />
                        <line x1="56" y1="195" x2="655" y2="195" />
                    </g>
                    <g fill="#94a3b8" font-family="Manrope, sans-serif" font-size="12"><text x="25"
                            y="199">0</text><text x="25" y="148">2</text><text x="25" y="97">4</text><text x="25"
                            y="46">6</text><text x="82" y="229">Oct</text><text x="180" y="229">Nov</text><text x="278"
                            y="229">Dec</text><text x="376" y="229">Jan</text><text x="474" y="229">Feb</text><text
                            x="572" y="229">Mar</text></g>
                    <g>
                        <rect x="78" y="119" width="54" height="76" rx="8" fill="#fb7185" />
                        <rect x="176" y="68" width="54" height="127" rx="8" fill="#D89A20" />
                        <rect x="274" y="144" width="54" height="51" rx="8" fill="#D89A20" />
                        <rect x="372" y="93" width="54" height="102" rx="8" fill="#D89A20" />
                        <rect x="470" y="119" width="54" height="76" rx="8" fill="#D89A20" />
                        <rect x="568" y="169" width="54" height="26" rx="8" fill="#D89A20" />
                    </g>
                    <g fill="#17212B" font-family="Manrope, sans-serif" font-size="13" font-weight="700"><text x="102"
                            y="109">3</text><text x="200" y="58">5</text><text x="298" y="134">2</text><text x="396"
                            y="83">4</text><text x="494" y="109">3</text><text x="592" y="159">1</text></g>
                </svg></div>
        </article>
        <article class="rounded-2xl bg-white p-6 shadow-soft">
            <div>
                <h2 class="text-lg font-extrabold">Inventory health</h2>
                <p class="mt-1 text-sm text-slate-500">Current distribution of your assets.</p>
            </div>
            <div class="mt-6 flex items-center justify-center gap-6"><svg class="h-36 w-36 -rotate-90"
                    viewBox="0 0 120 120" role="img" aria-label="85 percent of assets are in use">
                    <circle cx="60" cy="60" r="46" fill="none" stroke="#f1f5f9" stroke-width="13" />
                    <circle cx="60" cy="60" r="46" fill="none" stroke="#1F9D83" stroke-dasharray="246 289"
                        stroke-linecap="round" stroke-width="13" />
                    <circle cx="60" cy="60" r="46" fill="none" stroke="#f59e0b" stroke-dasharray="31 289"
                        stroke-dashoffset="-253" stroke-linecap="round" stroke-width="13" />
                </svg>
                <div>
                    <p class="text-3xl font-extrabold">85<span class="text-base text-slate-400">%</span></p>
                    <p class="mt-1 text-xs font-semibold text-slate-500">in use</p>
                </div>
            </div>
            <div class="mt-7 space-y-4 text-sm">
                <div class="flex items-center justify-between"><span
                        class="flex items-center gap-2 font-semibold text-slate-600"><i
                            class="h-2.5 w-2.5 rounded-full bg-signal"></i>In use</span><b>1,096</b></div>
                <div class="flex items-center justify-between"><span
                        class="flex items-center gap-2 font-semibold text-slate-600"><i
                            class="h-2.5 w-2.5 rounded-full bg-amber"></i>Available</span><b>142</b></div>
                <div class="flex items-center justify-between"><span
                        class="flex items-center gap-2 font-semibold text-slate-600"><i
                            class="h-2.5 w-2.5 rounded-full bg-rose-400"></i>Needs attention</span><b>17</b></div>
            </div><a class="mt-6 block text-sm font-bold text-signal" href="it-assets.html">View asset directory →</a>
        </article>
    </section>

    <section class="mt-8 grid gap-6 xl:grid-cols-[1.4fr_.8fr]">
        <article class="rounded-2xl bg-white p-6 shadow-soft" id="assets">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-extrabold">Recent assets</h2>
                    <p class="mt-1 text-sm text-slate-500">Latest items added to inventory</p>
                </div><button class="text-sm font-bold text-signal" type="button">View all →</button>
            </div>
            <div class="mt-5 overflow-x-auto">
                <table class="w-full min-w-[560px] text-left text-sm">
                    <thead class="border-b border-slate-100 text-xs uppercase tracking-wider text-slate-400">
                        <tr>
                            <th class="pb-3 font-semibold">Asset</th>
                            <th class="pb-3 font-semibold">Assignee</th>
                            <th class="pb-3 font-semibold">Status</th>
                            <th class="pb-3 text-right font-semibold">Added</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr>
                            <td class="py-4"><b class="block">MacBook Pro 14”</b><span
                                    class="mono text-xs text-slate-400">AT-2048</span></td>
                            <td class="py-4 text-slate-600">Maya Chen</td>
                            <td class="py-4"><span
                                    class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-bold text-signal">In
                                    use</span></td>
                            <td class="py-4 text-right text-slate-500">Today</td>
                        </tr>
                        <tr>
                            <td class="py-4"><b class="block">Dell UltraSharp 27</b><span
                                    class="mono text-xs text-slate-400">AT-2047</span></td>
                            <td class="py-4 text-slate-600">Unassigned</td>
                            <td class="py-4"><span
                                    class="rounded-full bg-amber-50 px-2.5 py-1 text-xs font-bold text-amber-700">Available</span>
                            </td>
                            <td class="py-4 text-right text-slate-500">Today</td>
                        </tr>
                        <tr>
                            <td class="py-4"><b class="block">iPhone 16 Pro</b><span
                                    class="mono text-xs text-slate-400">AT-2046</span></td>
                            <td class="py-4 text-slate-600">Noah Williams</td>
                            <td class="py-4"><span
                                    class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-bold text-signal">In
                                    use</span></td>
                            <td class="py-4 text-right text-slate-500">Yesterday</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
        <article class="rounded-2xl bg-ink p-6 text-white shadow-soft" id="requests">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold tracking-[.16em] text-emerald-300">ACTION CENTER</p>
                    <h2 class="mt-2 text-xl font-extrabold">6 items need review</h2>
                </div><span class="grid h-11 w-11 place-items-center rounded-xl bg-white/10 text-xl">↗</span>
            </div>
            <div class="mt-6 space-y-3"><button
                    class="flex w-full items-center justify-between rounded-xl bg-white/10 p-4 text-left hover:bg-white/15"
                    type="button"><span><b class="block text-sm">Warranty expires soon</b><span
                            class="mt-1 block text-xs text-slate-400">3 laptops expire in 30
                            days</span></span><span>→</span></button><button
                    class="flex w-full items-center justify-between rounded-xl bg-white/10 p-4 text-left hover:bg-white/15"
                    type="button"><span><b class="block text-sm">Unassigned hardware</b><span
                            class="mt-1 block text-xs text-slate-400">18 assets awaiting
                            allocation</span></span><span>→</span></button><button
                    class="flex w-full items-center justify-between rounded-xl bg-white/10 p-4 text-left hover:bg-white/15"
                    type="button"><span><b class="block text-sm">Overdue returns</b><span
                            class="mt-1 block text-xs text-slate-400">2 assets were due this
                            week</span></span><span>→</span></button></div><button
                class="mt-6 w-full rounded-xl bg-white py-3 text-sm font-extrabold text-ink" type="button">Review
                all requests</button>
        </article>
    </section>
</x-layouts.app>