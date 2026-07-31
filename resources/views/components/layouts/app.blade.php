@include('components.partials.header')

<body class="min-h-screen bg-mist text-ink">
    <div class="flex min-h-screen">

        @include('components.partials.navbar')

        <main class="min-w-0 flex-1 px-5 py-6 sm:px-8 lg:px-10">
            <header class="flex items-center justify-between gap-4">
                <div class="lg:hidden"><span class="text-lg font-extrabold">ATLAS</span><span
                        class="ml-2 text-xs font-bold text-slate-400">INVENTORY</span></div>
                <div class="relative hidden max-w-md flex-1 md:block"><span
                        class="absolute left-4 top-3 text-slate-400">⌕</span><input
                        class="w-full rounded-xl border border-slate-200 bg-white py-2.5 pl-10 pr-4 text-sm outline-none placeholder:text-slate-400 focus:border-signal"
                        placeholder="Search assets, serial numbers, people…" /></div>
                <div class="ml-auto flex items-center gap-3"><button
                        class="relative grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white text-slate-500"
                        aria-label="Notifications" type="button">♢<span
                            class="absolute right-2 top-2 h-2 w-2 rounded-full bg-amber"></span></button><button
                        class="rounded-xl bg-ink px-4 py-2.5 text-sm font-bold text-white transition hover:bg-slate-700"
                        id="addAsset" type="button">+ Add asset</button></div>
            </header>

            <section class="mt-10" id="overview">
                <p class="mono text-xs font-medium uppercase tracking-[.14em] text-signal">Friday, 24 July</p>
                <div class="mt-2 flex flex-wrap items-end justify-between gap-3">
                    <div>
                        <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Good morning, Jordan.</h1>
                        <p class="mt-2 text-sm text-slate-500">Here’s what needs your attention today.</p>
                    </div><button class="text-sm font-bold text-signal" id="refresh" type="button">↻ Refresh
                        data</button>
                </div>
            </section>

            <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <article class="rounded-2xl bg-white p-5 shadow-soft">
                    <div class="flex justify-between">
                        <p class="text-sm font-semibold text-slate-500">Total assets</p><span
                            class="text-signal">▣</span>
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
                        <p class="text-sm font-semibold text-slate-500">Needs attention</p><span
                            class="text-rose-500">!</span>
                    </div>
                    <p class="mt-5 text-3xl font-extrabold">17</p>
                    <p class="mt-2 text-xs font-semibold text-rose-500">6 require action today</p>
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
                        class="mt-6 w-full rounded-xl bg-white py-3 text-sm font-extrabold text-ink"
                        type="button">Review all requests</button>
                </article>
            </section>
        </main>
    </div>

    @include('components.partials.forms.add-asset')
</body>

@include('components.partials.footer')