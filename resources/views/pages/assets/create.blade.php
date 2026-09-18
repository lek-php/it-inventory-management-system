<x-layouts.app>
    <header class="flex items-center justify-between"><a class="text-sm font-bold text-slate-500 hover:text-ink"
            href="/">← Back to overview</a><span
            class="mono text-xs font-medium uppercase tracking-[.14em] text-signal">New inventory record</span>
    </header>

    <section class="mt-10">
        <div class="flex flex-wrap items-end justify-between gap-5">
            <div>
                <p class="text-sm font-bold text-signal">ASSET MANAGEMENT</p>
                <h1 class="mt-2 text-3xl font-extrabold tracking-tight sm:text-4xl">
                    Add an asset
                </h1>
                <p class="mt-3 text-sm text-slate-500">
                    Record the details needed to track this item throughout its lifecycle.
                </p>
            </div>
        </div>
    </section>

    <form class="mt-8 space-y-6" id="asset-form" method="POST" action="/assets/create">
        @csrf
        <section class="rounded-2xl bg-white p-6 shadow-soft sm:p-7">
            <div class="border-b border-slate-100 pb-5">
                <h2 class="text-lg font-extrabold">Asset details</h2>
                <p class="mt-1 text-sm text-slate-500">Basic identification and classification.</p>
            </div>
            <div class="mt-6 grid gap-5 sm:grid-cols-2">
                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Asset Name
                        <input name="asset_name"
                            class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                            placeholder="e.g. MacBook Pro 14-inch">
                    </label>

                    @error('asset_name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Category
                        <select name="category"
                            class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal outline-none focus:border-signal">
                            <option value="">Choose a category</option>
                            <option>Laptop</option>
                            <option>Desktop</option>
                            <option>Monitor</option>
                            <option>Tablet</option>
                            <option>Printer</option>
                            <option>Peripherals</option>
                            <option>Network equipment</option>
                        </select>
                    </label>

                    @error('category')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Asset Tag / ID
                        <input name="tag"
                            class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                            placeholder="e.g. ASB-0001">
                    </label>

                    @error('tag')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Manufacturer
                        <input name="manufacturer"
                            class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                            placeholder="e.g. Apple">
                    </label>

                    @error('manufacturer')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Model
                        <input name="model"
                            class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                            placeholder="e.g. M4 Pro">
                    </label>

                    @error('model')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Serial number
                        <input name="serial_number"
                            class="mono mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                            placeholder="Serial number">
                    </label>

                    @error('serial_number')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Supplier / vendor
                        <input name="vendor"
                            class="mono mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                            placeholder="e.g AMTI, Computech">
                    </label>

                    @error('vendor')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>


            </div>
        </section>
        <section class="rounded-2xl bg-white p-6 shadow-soft sm:p-7">
            <div class="border-b border-slate-100 pb-5">
                <h2 class="text-lg font-extrabold">Assignment & status</h2>
                <p class="mt-1 text-sm text-slate-500">Set where the asset is and who is responsible for it.</p>
            </div>
            <div class="mt-6 grid gap-5 sm:grid-cols-2">

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Status
                        <select name="status"
                            class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal outline-none focus:border-signal">
                            <option value="Available">Available</option>
                            <option value="Assigned">In use</option>
                            <option value="In repair">In repair</option>
                            <option value="Retired">Retired</option>
                            <option value="For disposal">For disposal</option>
                            <option value="For maintenance">For disposal</option>
                            <option value="Disposed">Disposed</option>
                        </select>
                    </label>

                    @error('status')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Assigned to
                        <select name="assigned_to"
                            class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal outline-none focus:border-signal">
                            <option>Unassigned</option>
                            <option>Maya Chen</option>
                            <option>Noah Williams</option>
                            <option>Jordan Reyes</option>
                        </select>
                    </label>

                    @error('assigned_to')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold">
                        Location
                        <input name="location"
                            class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                            placeholder="e.g. Manila office">
                    </label>

                    @error('location')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold">
                        Purchase date
                        <input name="purchase_date"
                            class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none focus:border-signal"
                            type="date">
                    </label>

                    @error('purchase_date')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label class="block text-sm font-bold">
                        Warranty Expiration
                        <input name="warranty_expiration"
                            class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none focus:border-signal"
                            type="date">
                    </label>

                    @error('warranty_expiration')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </section>

        <section class="rounded-2xl bg-white p-6 shadow-soft sm:p-7">
            <h2 class="text-lg font-extrabold">Additional notes</h2>
            <label class="mt-5 block text-sm font-bold">
                Notes
                <textarea name="notes"
                    class="mt-2 min-h-28 w-full resize-y rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                    placeholder="Add purchase, condition, or configuration notes…"></textarea>
            </label>
        </section>

        <div class="flex flex-wrap justify-end gap-3 pb-10">
            <a class="rounded-xl px-5 py-3 text-sm font-bold text-slate-600 hover:bg-slate-200"
                href="it-inventory-home.html">
                Cancel
            </a>

            <button class="rounded-xl bg-ink px-5 py-3 text-sm font-extrabold text-white hover:bg-slate-700"
                type="submit">
                Save asset
            </button>

        </div>
    </form>
</x-layouts.app>