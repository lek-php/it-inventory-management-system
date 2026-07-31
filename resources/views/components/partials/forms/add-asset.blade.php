<div class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/40 p-4" id="modal" role="dialog"
    aria-modal="true" aria-labelledby="modalTitle">
    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-extrabold" id="modalTitle">Add an asset</h2><button class="text-xl text-slate-400"
                id="closeModal" aria-label="Close" type="button">×</button>
        </div>
        <form class="mt-5 space-y-4" id="assetForm"><label class="block text-sm font-bold">Asset name<input
                    class="mt-2 w-full rounded-xl border border-slate-200 px-3 py-2.5 outline-none focus:border-signal"
                    required placeholder="e.g. Lenovo ThinkPad X1" /></label><label
                class="block text-sm font-bold">Category<select
                    class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-3 py-2.5 outline-none focus:border-signal">
                    <option>Laptop</option>
                    <option>Monitor</option>
                    <option>Mobile device</option>
                    <option>Accessory</option>
                </select></label><button class="w-full rounded-xl bg-ink py-3 text-sm font-extrabold text-white"
                type="submit">Create asset</button></form>
    </div>
</div>