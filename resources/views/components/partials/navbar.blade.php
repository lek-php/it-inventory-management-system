<aside class="hidden w-64 shrink-0 border-r border-slate-200 bg-white px-5 py-6 lg:flex lg:flex-col">
    <a class="flex items-center gap-3" href="#">
        <span class="grid h-9 w-9 place-items-center rounded-xl bg-ink text-lg font-extrabold text-white">A</span>
        <span><span class="block text-sm font-extrabold tracking-tight">ATLAS</span><span
                class="block text-[10px] font-semibold tracking-[.18em] text-slate-400">IT
                INVENTORY</span></span>
    </a>
    <nav class="mt-12 space-y-1 text-sm font-semibold">
        <x-partials.nav-link href="/" :active="request()->is('/')"><span>▦</span>Overview</x-partials.nav-link>

        <x-partials.nav-link href="/assets" :active="request()->is('assets')"><span>▣</span>Assets
        </x-partials.nav-link>

        <a class=" flex items-center gap-3 rounded-xl px-3 py-3 text-slate-500 hover:bg-slate-50"
            href="#requests"><span>↗</span>Requests <span
                class="ml-auto rounded-md bg-amber-100 px-2 py-0.5 text-xs text-amber-700">8</span></a>
        <a class="flex items-center gap-3 rounded-xl px-3 py-3 text-slate-500 hover:bg-slate-50"
            href="#people"><span>◎</span>People</a>
        <a class="flex items-center gap-3 rounded-xl px-3 py-3 text-slate-500 hover:bg-slate-50"
            href="#reports"><span>◫</span>Reports</a>
    </nav>
    <div class="mt-auto rounded-2xl bg-ink p-4 text-white">
        <p class="text-xs font-semibold text-emerald-300">ASSET HEALTH</p>
        <p class="mt-2 text-3xl font-extrabold">94<span class="text-base text-slate-400">%</span></p>
        <p class="mt-1 text-xs leading-5 text-slate-400">Your fleet is in great shape this month.</p>
    </div>
    <button class="mt-5 flex items-center gap-3 text-left" type="button"><span
            class="grid h-9 w-9 place-items-center rounded-full bg-slate-200 text-xs font-bold">JR</span><span
            class="text-xs"><b class="block">Jordan Reyes</b><span
                class="text-slate-400">Administrator</span></span></button>
</aside>