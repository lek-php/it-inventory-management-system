<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in · Felias</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <style>
        body {
            font-family: Manrope, sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-mist text-ink">
    <main class="grid min-h-screen lg:grid-cols-2">
        <section class="flex items-center justify-center px-6 py-12">
            <div class="w-full max-w-md">
                <a class="inline-flex items-center gap-3" href="it-inventory-home.html"><span
                        class="grid h-10 w-10 place-items-center rounded-xl bg-ink text-lg font-extrabold text-white">A</span><span><b
                            class="block text-sm tracking-tight">FELIAS</b><span
                            class="block text-[10px] font-semibold tracking-[.18em] text-slate-400">IT
                            INVENTORY</span></span></a>
                <div class="mt-14">
                    <p class="text-sm font-bold text-signal">
                        WELCOME BACK
                    </p>
                    <h1 class="mt-2 text-3xl font-extrabold tracking-tight">
                        Sign in to your workspace
                    </h1>
                    <p class="mt-3 text-sm text-slate-500">
                        Manage your organization’s hardware in one place.
                    </p>
                </div>
                <form class="mt-8 space-y-5" id="loginForm">
                    <label class="block text-sm font-bold">Work email<input
                            class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none placeholder:text-slate-400 focus:border-signal"
                            type="email" required placeholder="you@company.com" /></label><label
                        class="block text-sm font-bold">Password<input
                            class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 outline-none placeholder:text-slate-400 focus:border-signal"
                            type="password" required placeholder="Enter your password" /></label> <button
                        class="w-full rounded-xl bg-ink py-3.5 text-sm font-extrabold text-white hover:bg-slate-700"
                        type="submit">
                        Sign in
                    </button>
                </form>
            </div>
        </section>
        <aside class="hidden bg-ink p-12 text-white lg:flex lg:flex-col">
            <div class="max-w-md">
                <p class="mt-20 text-sm font-bold tracking-[.18em] text-emerald-300">
                    YOUR FLEET, CLARIFIED
                </p>
                <h2 class="mt-5 text-5xl font-extrabold leading-tight tracking-tight">
                    The calm way to manage IT assets.
                </h2>
                <p class="mt-6 text-base leading-7 text-slate-400">
                    Keep hardware, people, warranties, and requests
                    effortlessly organized.
                </p>
            </div>
        </aside>
    </main>
    <div class="fixed bottom-6 left-1/2 hidden -translate-x-1/2 rounded-xl bg-ink px-5 py-3 text-sm font-bold text-white shadow-xl"
        id="toast">
        Signed in successfully.
    </div>
    <script>
        document
                .getElementById("loginForm")
                .addEventListener("submit", (e) => {
                    e.preventDefault();
                    const t = document.getElementById("toast");
                    t.classList.remove("hidden");
                    setTimeout(() => t.classList.add("hidden"), 2500);
                });
    </script>
</body>

</html>