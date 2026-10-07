<x-layouts.app>

    @if (session('success'))
    <x-partials.toaster>{{ session('success') }}</x-partials.toaster>
    @endif

    <header class="flex flex-wrap items-center justify-between gap-4"><a
            class="text-sm font-bold text-slate-500 hover:text-ink" href="/assets">← Back to
            assets</a><span class="mono text-xs font-medium uppercase tracking-[.14em] text-signal">Asset
            record</span></header>
    <section class="mt-10">
        <div class="flex flex-wrap items-start justify-between gap-5">
            <div class="flex gap-4">
                <span
                    class="flex items-start justify-center h-11 w-14 place-items-center rounded-2xl bg-emerald-50 text-2xl text-signal">
                    <img src="{{ \App\Helpers\AssetHelper::categoryLabel($asset->category) }}"
                        alt="{{ $asset['category'] }}" class="h-10 w-10">
                </span>
                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <h1 class="text-3xl font-extrabold tracking-tight" id="assetName">{{ $asset['asset_name'] }}
                        </h1><span class="rounded-full bg-sky-50 px-2.5 py-1 text-xs font-bold text-sky-700"
                            id="assetStatus">{{ $asset['status'] === 'Assigned' ? 'In use' : $asset['status'] }}</span>
                    </div>
                    <p class="mono mt-2 text-sm text-slate-400" id="assetTag">{{ $asset['tag'] }} · {{ $asset['model']
                        }}</p>
                    <p class="mt-2 text-sm text-slate-500" id="assetSubline">{{ $asset['manufacturer'] }} · {{
                        $asset['category'] }} · Added {{ \App\Helpers\AssetHelper::timeAgo($asset->created_at) }}</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="/assets/asset/{{ $asset['tag'] }}/edit"
                    class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-600 hover:bg-slate-50 hover:border-slate-300 transition hover:text-slate-700"
                    id="edit" type="button">
                    Edit asset
                </a>
                @if ($asset['assigned_to'] === 0)
                <button
                    class="rounded-xl bg-ink px-4 py-2.5 text-sm font-extrabold text-white hover:bg-slate-700 cursor-pointer transition"
                    id="assign-user-btn" type="button">
                    Assign asset
                </button>
                @endif
            </div>
        </div>
    </section>
    <section class="mt-8 grid gap-6 xl:grid-cols-[1.4fr_.8fr]">
        <div class="space-y-6">
            <article class="rounded-2xl bg-white p-6 shadow-soft">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-extrabold">Asset overview</h2>
                        <p class="mt-1 text-sm text-slate-500">Identification, ownership, and current state.</p>
                    </div><span class="mono rounded-lg bg-slate-100 px-3 py-2 text-xs font-medium" id="tagChip">{{
                        $asset['tag'] }}</span>
                </div>
                <dl class="mt-6 grid gap-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Assigned to</dt>
                        <dd class="mt-2 flex items-center gap-2 font-extrabold">
                            <span class="grid h-7 w-7 place-items-center rounded-full bg-slate-100 text-[10px]"
                                id="departmentCode">
                                {{ $asset->assignedUser?->department?->code ?? '' }}
                            </span>
                            <span id="ownerName">
                                {{ $asset->assignedUser?->name ?? 'Unassigned' }}
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Location</dt>
                        <dd class="mt-2 font-semibold" id="location">{{ $asset['location'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Category</dt>
                        <dd class="mt-2 font-semibold" id="category">{{ $asset['category'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Purchase date</dt>
                        <dd class="mt-2 font-semibold" id="purchaseDate">
                            {{ \App\Helpers\AssetHelper::formatDate($asset->purchase_date) }}
                        </dd>
                    </div>
                </dl>
            </article>
            <article class="rounded-2xl bg-white p-6 shadow-soft">
                <h2 class="text-lg font-extrabold">Hardware & coverage</h2>
                <p class="mt-1 text-sm text-slate-500">Technical specification and lifecycle data.</p>
                <div class="mt-6 grid gap-5 sm:grid-cols-3">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Manufacturer</p>
                        <p class="mt-2 font-semibold" id="manufacturer">{{ $asset['manufacturer'] }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">{{ $asset['model'] }}</p>
                        <p class="mt-2 font-semibold" id="model">M4 Pro · 14-inch</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Serial number</p>
                        <p class="mono mt-2 text-sm font-medium" id="serial">{{ $asset['serial_number'] }}</p>
                    </div>
                </div>
                <div class="mt-6 border-t border-slate-100 pt-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold">Warranty coverage</p>
                            <p class="mt-1 text-sm text-slate-500" id="warrantyText">Active until {{
                                \App\Helpers\AssetHelper::formatDate($asset->warranty_expiration) }}
                            </p>
                        </div>
                        <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-bold text-signal"
                            id="warrantyBadge">
                            {{ \App\Helpers\AssetHelper::warrantyDaysLeft(
                            $asset->purchase_date,
                            $asset->warranty_expiration
                            ) }}
                        </span>
                    </div>
                    <div id="warrantyProgress" data-purchase-date="{{ $asset->purchase_date }}"
                        data-expiration-date="{{ $asset->warranty_expiration }}"
                        class="mt-3 h-2 overflow-hidden rounded-full bg-slate-100">
                        <div id="warrantyProgressBar" class="h-full rounded-full transition-all duration-500"
                            style="width: 0%">
                        </div>
                    </div>
                </div>
            </article>
            <article class="hidden rounded-2xl bg-white p-6 shadow-soft">
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
            {{-- HIDDEN FOR THE MEAN TIME --}}
            <article class="hidden rounded-2xl bg-ink p-6 text-white shadow-soft">
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
            <article class=" rounded-2xl bg-white p-6 shadow-soft">
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

    <!-- Parent / Overlay -->
    <div id="assetModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-slate-950/50 p-4"
        role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl">

            <!-- Header -->
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-signal">
                        Asset Management
                    </p>

                    <h2 id="modalTitle" class="mt-1 text-xl font-extrabold text-ink">
                        Assign asset
                    </h2>

                    <p class="mt-2 text-sm leading-5 text-slate-500">
                        Assign this asset to a user. The assignment will be recorded
                        in the asset inventory.
                    </p>
                </div>

                <button type="button"
                    class="closeAssignAssetModal grid h-9 w-9 shrink-0 place-items-center rounded-lg text-xl text-slate-400 hover:bg-slate-100 hover:text-ink"
                    aria-label="Close modal">
                    ×
                </button>
            </div>

            <!-- Asset Information -->
            <div class="mt-5 rounded-xl bg-slate-50 px-4 py-3">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Asset Tag
                </p>

                <p class="mt-1 font-bold text-ink">
                    {{ $asset['asset_name'] }}
                </p>
            </div>

            <!-- User Selection -->
            <form class="mt-5" method="POST" action="/assets/asset/{{ $asset['id'] }}/assign">
                @csrf
                <div class="space-y-2">
                    <input type="hidden" name="id" value="{{ $asset['id'] }}">
                    <label class="block text-sm font-bold">
                        Assign to
                        <select name="assigned_to" id="users"
                            class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal outline-none focus:border-signal">
                            <option value="">Unassigned</option>
                        </select>
                    </label>

                    @error('assigned_to')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <!-- Footer -->
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button"
                        class="closeAssignAssetModal rounded-xl px-4 py-2.5 text-sm font-bold text-slate-600 hover:bg-slate-100 hover:text-slate-400 cursor-pointer transition">
                        Cancel
                    </button>

                    <button type="submit"
                        class="rounded-xl bg-ink px-4 py-2.5 text-sm font-bold text-white hover:bg-slate-700 cursor-pointer transition">
                        Assign Asset
                    </button>
                </div>
            </form>



        </div>
    </div>

    @vite('resources/js/assets/show.js')

</x-layouts.app>