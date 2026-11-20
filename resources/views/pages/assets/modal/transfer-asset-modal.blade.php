<div id="transferAssetModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-slate-950/50 p-4"
    role="dialog" aria-modal="true" aria-labelledby="transferAssetModal">
    <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl">

        <!-- Header -->
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-signal">
                    Asset Management
                </p>

                <h2 id="modalTitle" class="mt-1 text-xl font-extrabold text-ink">
                    Transfer asset
                </h2>

                <p class="mt-2 text-sm leading-5 text-slate-500">
                    Transfer this asset to another user. The assignment will be recorded in the asset inventory, and the
                    previous assignment record will be updated to reflect the transfer.
                </p>
            </div>

            <button type="button"
                class="closeTransferAssetModal grid h-9 w-9 shrink-0 place-items-center rounded-lg text-xl text-slate-400 hover:bg-slate-100 hover:text-ink"
                aria-label="Close modal">
                ×
            </button>
        </div>

        <!-- Asset Information -->
        <div class="mt-5 rounded-xl bg-slate-50 px-4 py-3">
            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                Asset Name
            </p>

            <p class="mt-1 font-bold text-ink">
                {{ $asset['asset_name'] }}
            </p>
        </div>

        <!-- User Selection -->
        <form class="mt-5" method="POST" action="/assets/asset/{{ $asset['id'] }}/transfer">
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

                <label class="block text-sm font-bold">
                    Location
                    <select name="location"
                        class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal outline-none focus:border-signal">
                        <option value="">Select a location</option>
                        <option value="Admin Office" value="{{ old('location') === 'Admin Office' ? 'selected' : '' }}">
                            Admin Office
                        </option>
                        <option value="Clinic" value="{{ old('location') === 'Clinic' ? 'selected' : '' }}">
                            Clinic
                        </option>
                        <option value="Operation Office"
                            value="{{ old('location') === 'Operation Office' ? 'selected' : '' }}">
                            Operation Office
                        </option>
                        <option value="IPQC" value="{{ old('location') === 'IPQC' ? 'selected' : '' }}">
                            IPQC
                        </option>
                        <option value="Diecast Area" value="{{ old('location') === 'Diecast Area' ? 'selected' : '' }}">
                            Diecast Area
                        </option>
                        <option value="Deburring Area"
                            value="{{ old('location') === 'Deburring Area' ? 'selected' : '' }}">
                            Deburring Area
                        </option>
                        <option value="Machining Area"
                            value="{{ old('location') === 'Machining Area' ? 'selected' : '' }}">
                            Machining Area
                        </option>
                        <option value="Washing Area" value="{{ old('location') === 'Washing Area' ? 'selected' : '' }}">
                            Washing Area
                        </option>
                        <option value="FVI Area" value="{{ old('location') === 'FVI Area' ? 'selected' : '' }}">
                            FVI Area
                        </option>
                        <option value="Flatness & Vibration Area"
                            value="{{ old('location') === 'Flatness & Vibration Area' ? 'selected' : '' }}">
                            Flatness & vibration Area
                        </option>
                        <option value="OQI Area" value="{{ old('location') === 'OQI Area' ? 'selected' : '' }}">
                            OQI Area
                        </option>
                        <option value="Warehouse" value="{{ old('location') === 'Warehouse' ? 'selected' : '' }}">
                            Warehouse
                        </option>
                        <option value="Warehouse 3rd Floor"
                            value="{{ old('location') === 'Warehouse 3rd Floor' ? 'selected' : '' }}">
                            Warehouse 3rd Floor
                        </option>
                        <option value="Guard House" value="{{ old('location') === 'Guard House' ? 'selected' : '' }}">
                            Guard House
                        </option>
                        <option value="Canteen" value="{{ old('location') === 'Canteen' ? 'selected' : '' }}">
                            Canteen
                        </option>
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