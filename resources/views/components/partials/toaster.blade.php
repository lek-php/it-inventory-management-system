<div id="toast" class="fixed right-6 top-6 z-50 rounded-xl border border-emerald-200 bg-white p-4 shadow-lg">
    <div class="flex gap-3">
        <div class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-emerald-100 text-emerald-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>

        <div class="flex items-center justify-center">
            <p class="font-bold text-slate-800 text-sm">
                {{ $slot }}
            </p>
        </div>

        <button type="button" id="closeToast"
            class="text-slate-400 hover:text-slate-600 flex items-center justify-center cursor-pointer transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>