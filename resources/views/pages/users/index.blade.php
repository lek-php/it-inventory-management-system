<x-layouts.app>
    <header class="flex flex-wrap items-center justify-between gap-4"><a
            class="text-sm font-bold text-slate-500 hover:text-ink" href="/">← Back to
            overview</a><span class="mono text-xs font-medium uppercase tracking-[.14em] text-signal">Asset user
            directory</span></header>
    <section class="mt-10">
        <div class="flex flex-wrap items-end justify-between gap-5">
            <div>
                <p class="text-sm font-bold text-signal">PEOPLE & ASSIGNMENTS</p>
                <h1 class="mt-2 text-3xl font-extrabold tracking-tight sm:text-4xl">Your people</h1>
                <p class="mt-3 text-sm text-slate-500">See who has assets, what they use, and where attention is needed.
                </p>
            </div>
            <a href="/users/create"
                class="rounded-xl bg-ink px-5 py-3 text-sm font-extrabold text-white hover:bg-slate-700" id="invite"
                type="button">
                + Add user
            </a>
        </div>
    </section>
    <section class="mt-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total people</p>
            <p class="mt-2 text-3xl font-extrabold">326</p>
            <p class="mt-2 text-xs font-semibold text-signal">↑ 8 this month</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">With assets</p>
            <p class="mt-2 text-3xl font-extrabold">313</p>
            <p class="mt-2 text-xs text-slate-500">96% coverage</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">No assignment</p>
            <p class="mt-2 text-3xl font-extrabold text-amber">13</p>
            <p class="mt-2 text-xs text-slate-500">May need equipment</p>
        </article>
        <article class="rounded-2xl bg-white p-5 shadow-soft">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Return due</p>
            <p class="mt-2 text-3xl font-extrabold text-rose-500">2</p>
            <p class="mt-2 text-xs text-slate-500">Due this week</p>
        </article>
    </section>
    <section class="mt-8 grid gap-6 xl:grid-cols-[1.5fr_.7fr]">
        <article class="rounded-2xl bg-white p-5 shadow-soft sm:p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h2 class="text-lg font-extrabold">User directory</h2>
                    <p class="mt-1 text-sm text-slate-500"><span id="resultCount">6</span> people shown</p>
                </div><select
                    class="rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-semibold outline-none focus:border-signal"
                    id="filter">
                    <option value="all">All assignment states</option>
                    <option value="assigned">Has assets</option>
                    <option value="unassigned">No assets</option>
                    <option value="return">Return due</option>
                </select>
            </div><label class="relative mt-5 block"><span class="absolute left-4 top-3 text-slate-400">⌕</span><input
                    class="w-full rounded-xl border border-slate-200 py-2.5 pl-10 pr-4 text-sm outline-none placeholder:text-slate-400 focus:border-signal"
                    id="search" placeholder="Search people, department, or asset tag…"></label>
            <div class="mt-5 overflow-x-auto">
                <table class="w-full min-w-[650px] text-left text-sm">
                    <thead class="border-b border-slate-100 text-xs uppercase tracking-wider text-slate-400">
                        <tr>
                            <th class="pb-3 font-semibold"><button class="sort font-semibold" data-key="name"
                                    type="button">Person
                                    ↕</button></th>
                            <th class="pb-3 font-semibold"><button class="sort font-semibold" data-key="department"
                                    type="button">Department ↕</button></th>
                            <th class="pb-3 font-semibold">Assets</th>
                            <th class="pb-3 font-semibold"><button class="sort font-semibold" data-key="state"
                                    type="button">Assignment ↕</button></th>
                            <th class="pb-3 text-right font-semibold"><button class="sort font-semibold"
                                    data-key="activityOrder" type="button">Last activity ↕</button></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100" id="peopleRows"></tbody>
                </table>
            </div>
            <div class="mt-5 flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 pt-5 text-sm">
                <p class="text-slate-500" id="pageSummary">Showing <b class="text-ink">1–5</b> of <b
                        class="text-ink">12</b>
                    people</p>
                <div class="flex items-center gap-2"><button
                        class="rounded-lg border border-slate-200 px-3 py-2 font-bold text-slate-600 hover:bg-slate-50 disabled:cursor-not-allowed disabled:text-slate-300"
                        id="previous" type="button">← Previous</button>
                    <div class="flex gap-1" id="pageNumbers"></div><button
                        class="rounded-lg border border-slate-200 px-3 py-2 font-bold text-slate-600 hover:bg-slate-50 disabled:cursor-not-allowed disabled:text-slate-300"
                        id="next" type="button">Next →</button>
                </div>
            </div>
        </article>
        <aside class="rounded-2xl bg-ink p-6 text-white shadow-soft">
            <p class="text-xs font-bold tracking-[.16em] text-emerald-300">ASSIGNMENT INSIGHTS</p>
            <h2 class="mt-2 text-xl font-extrabold">Keep every person equipped.</h2>
            <div class="mt-6 space-y-5">
                <div>
                    <div class="flex justify-between text-sm font-semibold"><span>Asset coverage</span><span>96%</span>
                    </div>
                    <div class="mt-2 h-2 overflow-hidden rounded-full bg-white/10">
                        <div class="h-full w-[96%] rounded-full bg-emerald-400"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm font-semibold"><span>Returns
                            completed</span><span>82%</span>
                    </div>
                    <div class="mt-2 h-2 overflow-hidden rounded-full bg-white/10">
                        <div class="h-full w-[82%] rounded-full bg-sky-400"></div>
                    </div>
                </div>
            </div>
            <div class="mt-8 space-y-3"><button
                    class="flex w-full items-center justify-between rounded-xl bg-white/10 p-4 text-left hover:bg-white/15"
                    type="button"><span><b class="block text-sm">New starters</b><span
                            class="mt-1 block text-xs text-slate-400">5 people joining next
                            week</span></span><span>→</span></button><button
                    class="flex w-full items-center justify-between rounded-xl bg-white/10 p-4 text-left hover:bg-white/15"
                    type="button"><span><b class="block text-sm">Offboarding</b><span
                            class="mt-1 block text-xs text-slate-400">2 returns due this
                            week</span></span><span>→</span></button>
            </div><button class="mt-6 w-full rounded-xl bg-white py-3 text-sm font-extrabold text-ink"
                type="button">Review assignments</button>
        </aside>
    </section>

    @vite('resources/js/users/index.js')
</x-layouts.app>