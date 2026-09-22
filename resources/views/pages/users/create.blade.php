<x-layouts.app>
    <header class="flex flex-wrap items-center justify-between gap-4"><a
            class="text-sm font-bold text-slate-500 hover:text-ink" href="/users">← Back to people</a><span
            class="mono text-xs font-medium uppercase tracking-[.14em] text-signal">New user record</span>
    </header>
    <div class="mx-auto mt-10 max-w-4xl">

        @if (session('success'))
        <x-partials.toaster>New user added successfully</x-partials.toaster>
        @endif

        <div>
            <p class="text-sm font-bold text-signal">PEOPLE & ASSIGNMENTS</p>
            <h1 class="mt-2 text-3xl font-extrabold tracking-tight sm:text-4xl">Add a user</h1>
            <p class="mt-3 text-sm text-slate-500">Create a user profile before assigning IT assets.</p>
        </div>
        <form class="mt-8 space-y-6" id="userCreateForm" method="POST" action="/users/create">
            @csrf
            <section class="rounded-2xl bg-white p-6 shadow-soft sm:p-7">
                <div class="border-b border-slate-100 pb-5">
                    <h2 class="text-lg font-extrabold">Employee details</h2>
                    <p class="mt-1 text-sm text-slate-500">Identification and contact information.</p>
                </div>
                <div class="mt-6 grid gap-5 sm:grid-cols-2">

                    <div class="space-y-2"><label class="block text-sm font-bold">
                            Employee ID
                            <input
                                class="mono mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                                name="employee_id" placeholder="e.g. EMP-00000" value="{{ old('employee_id') ?? '' }}">
                        </label>

                        @error('employee_id')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold">
                            Name
                            <input
                                class="mono mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                                name="name" placeholder="e.g. John Doe" value="{{ old('name') ?? '' }}">
                        </label>

                        @error('name')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold">
                            Department
                            <select
                                class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 font-normal outline-none focus:border-signal"
                                name="department" id="departments" wire:
                                data-selected="{{ old('department', $user->department ?? '') }}">
                                <option value="">Select a department</option>
                            </select>
                        </label>

                        @error('department')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold">
                            Phone
                            <input
                                class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                                name="phone" type="tel" placeholder="e.g. +63 917 123 4567"
                                value="{{ old('phone') ?? '' }}">
                        </label>

                        @error('phone')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold">
                            Email
                            <input
                                class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                                name="email" type="email" placeholder="employee@company.com"
                                value="{{ old('email') ?? '' }}">
                        </label>

                        @error('email')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold">
                            Position
                            <input
                                class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal"
                                name="position" placeholder="e.g. Product Designer" value="{{ old('position') ?? '' }}">
                        </label>

                        @error('position')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </section>

            <section class="rounded-2xl bg-white p-6 shadow-soft sm:p-7">
                <div class="border-b border-slate-100 pb-5">
                    <h2 class="text-lg font-extrabold">Account settings</h2>
                    <p class="mt-1 text-sm text-slate-500">Control this person’s status and application access.</p>
                </div>
                <div class="mt-6 space-y-4">
                    <label
                        class="flex cursor-pointer items-center justify-between gap-5 rounded-xl border border-slate-200 p-4">
                        <span>
                            <b class="block text-sm">Active user</b>
                            <span class="mt-1 block text-sm text-slate-500">This person can be assigned and receive
                                assets.</span>
                        </span>
                        <span class="relative inline-flex items-center">
                            <input class="peer sr-only" name="is_active" type="checkbox" value="1" checked>
                            <span class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-signal"></span>
                            <span
                                class="absolute left-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5"></span>
                        </span>
                    </label>

                    <label
                        class="flex cursor-pointer items-center justify-between gap-5 rounded-xl border border-slate-200 p-4">
                        <span>
                            <b class="block text-sm">Login user</b>
                            <span class="mt-1 block text-sm text-slate-500">Give this person access to the Felias
                                application.</span>
                        </span>
                        <span class="relative inline-flex items-center">
                            <input class="peer sr-only" id="isLoginUser" name="is_login_user" type="checkbox" value="1">
                            <span class="h-6 w-11 rounded-full bg-slate-200 transition peer-checked:bg-signal"></span>
                            <span
                                class="absolute left-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5"></span>
                        </span>
                    </label>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold">
                            Password
                            <span class="font-normal text-slate-400">
                                (optional unless login is enabled)
                            </span>
                            <input
                                class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 font-normal outline-none placeholder:text-slate-400 focus:border-signal disabled:cursor-not-allowed disabled:bg-slate-100"
                                id="password" name="password" type="password" disabled placeholder="No password set">
                        </label>

                        @error('password')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>
            <div class="flex flex-wrap justify-end gap-3 pb-10">
                <a class="rounded-xl px-5 py-3 text-sm font-bold text-slate-600 hover:bg-slate-200 cursor-pointer"
                    href="/users">
                    Cancel
                </a>
                <button
                    class="rounded-xl bg-ink px-5 py-3 text-sm font-extrabold text-white hover:bg-slate-700 cursor-pointer"
                    type="submit">
                    Save user
                </button>
            </div>
        </form>
    </div>

    @vite('resources/js/users/create.js')
</x-layouts.app>