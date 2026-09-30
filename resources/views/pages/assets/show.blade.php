<x-layouts.app>
    <header class="flex flex-wrap items-center justify-between gap-4"><a
            class="text-sm font-bold text-slate-500 hover:text-ink" href="/assets">← Back to
            assets</a><span class="mono text-xs font-medium uppercase tracking-[.14em] text-signal">Asset
            record</span></header>
    <section class="mt-10">
        <div class="flex flex-wrap items-start justify-between gap-5">
            <div class="flex gap-4"><span
                    class="grid h-14 w-14 place-items-center rounded-2xl bg-emerald-50 text-2xl text-signal">▣</span>
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <h1 class="text-3xl font-extrabold tracking-tight" id="assetName">MacBook Pro 14-inch
                        </h1><span class="rounded-full bg-sky-50 px-2.5 py-1 text-xs font-bold text-sky-700"
                            id="assetStatus">In use</span>
                    </div>
                    <p class="mono mt-2 text-sm text-slate-400" id="assetTag">AT-2048 · C02XX8JCLVDD</p>
                    <p class="mt-2 text-sm text-slate-500" id="assetSubline">Apple · Laptop · Added today</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-3"><button
                    class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 hover:bg-slate-50"
                    id="edit" type="button">Edit asset</button><button
                    class="rounded-xl bg-ink px-4 py-2.5 text-sm font-extrabold text-white hover:bg-slate-700"
                    id="assign" type="button">Assign asset</button></div>
        </div>
    </section>
    <section class="mt-8 grid gap-6 xl:grid-cols-[1.4fr_.8fr]">
        <div class="space-y-6">
            <article class="rounded-2xl bg-white p-6 shadow-soft">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-extrabold">Asset overview</h2>
                        <p class="mt-1 text-sm text-slate-500">Identification, ownership, and current state.</p>
                    </div><span class="mono rounded-lg bg-slate-100 px-3 py-2 text-xs font-medium"
                        id="tagChip">AT-2048</span>
                </div>
                <dl class="mt-6 grid gap-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Assigned to</dt>
                        <dd class="mt-2 flex items-center gap-2 font-extrabold"><span
                                class="grid h-7 w-7 place-items-center rounded-full bg-slate-100 text-[10px]"
                                id="ownerInitials">MC</span><span id="ownerName">Maya Chen</span></dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Location</dt>
                        <dd class="mt-2 font-semibold" id="location">Manila office · Floor 8</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Category</dt>
                        <dd class="mt-2 font-semibold" id="category">Laptop</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Purchase date</dt>
                        <dd class="mt-2 font-semibold" id="purchaseDate">12 Jul 2026</dd>
                    </div>
                </dl>
            </article>
            <article class="rounded-2xl bg-white p-6 shadow-soft">
                <h2 class="text-lg font-extrabold">Hardware & coverage</h2>
                <p class="mt-1 text-sm text-slate-500">Technical specification and lifecycle data.</p>
                <div class="mt-6 grid gap-5 sm:grid-cols-3">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Manufacturer</p>
                        <p class="mt-2 font-semibold" id="manufacturer">Apple</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Model</p>
                        <p class="mt-2 font-semibold" id="model">M4 Pro · 14-inch</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Serial number</p>
                        <p class="mono mt-2 text-sm font-medium" id="serial">C02XX8JCLVDD</p>
                    </div>
                </div>
                <div class="mt-6 border-t border-slate-100 pt-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold">Warranty coverage</p>
                            <p class="mt-1 text-sm text-slate-500" id="warrantyText">Active until 12 Jul 2029
                            </p>
                        </div><span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-bold text-signal"
                            id="warrantyBadge">1,016 days left</span>
                    </div>
                    <div class="mt-3 h-2 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-[82%] rounded-full bg-signal"></div>
                    </div>
                </div>
            </article>
            <article class="rounded-2xl bg-white p-6 shadow-soft">
                <h2 class="text-lg font-extrabold">Activity</h2>
                <div class="mt-5 space-y-5 border-l-2 border-slate-100 pl-5 text-sm">
                    <div class="relative"><span
                            class="absolute -left-[1.72rem] top-1 h-3 w-3 rounded-full bg-signal ring-4 ring-emerald-50"></span>
                        <p class="font-bold">Asset assigned to <span id="activityOwner">Maya Chen</span></p>
                        <p class="mt-1 text-slate-500">Today · by Jordan Reyes</p>
                    </div>
                    <div class="relative"><span
                            class="absolute -left-[1.72rem] top-1 h-3 w-3 rounded-full bg-slate-300 ring-4 ring-slate-50"></span>
                        <p class="font-bold">Asset created in inventory</p>
                        <p class="mt-1 text-slate-500">Today · by Jordan Reyes</p>
                    </div>
                </div>
            </article>
        </div>
        <aside class="space-y-6">
            <article class="rounded-2xl bg-ink p-6 text-white shadow-soft">
                <p class="text-xs font-bold tracking-[.16em] text-emerald-300">RECOMMENDED ACTIONS</p>
                <h2 class="mt-2 text-xl font-extrabold">Keep this asset healthy.</h2>
                <div class="mt-6 space-y-3" id="recommendations"><button
                        class="flex w-full items-center justify-between rounded-xl bg-white/10 p-4 text-left hover:bg-white/15"
                        type="button"><span><b class="block text-sm">Record device condition</b><span
                                class="mt-1 block text-xs text-slate-400">Add a current condition
                                note.</span></span><span>→</span></button><button
                        class="flex w-full items-center justify-between rounded-xl bg-white/10 p-4 text-left hover:bg-white/15"
                        type="button"><span><b class="block text-sm">Schedule a check-in</b><span
                                class="mt-1 block text-xs text-slate-400">Next review is due in 90
                                days.</span></span><span>→</span></button></div>
            </article>
            <article class="rounded-2xl bg-white p-6 shadow-soft">
                <h2 class="text-lg font-extrabold">Quick actions</h2>
                <div class="mt-5 grid gap-3"><button
                        class="rounded-xl border border-slate-200 px-4 py-3 text-left text-sm font-bold text-slate-700 hover:bg-slate-50"
                        type="button">↔ Transfer to another user</button><button
                        class="rounded-xl border border-slate-200 px-4 py-3 text-left text-sm font-bold text-slate-700 hover:bg-slate-50"
                        type="button">◫ Download asset record</button><button
                        class="rounded-xl border border-rose-100 px-4 py-3 text-left text-sm font-bold text-rose-600 hover:bg-rose-50"
                        type="button">Retire asset</button></div>
            </article>
        </aside>
    </section>

    @vite('resources/js/assets/index.js')

</x-layouts.app>