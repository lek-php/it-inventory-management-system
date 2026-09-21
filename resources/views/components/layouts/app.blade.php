@include('components.partials.header')

<body class="min-h-screen bg-mist text-ink">
    <div class="flex min-h-screen">

        @include('components.partials.navbar')

        <main class="min-w-0 flex-1 px-5 py-6 sm:px-8 lg:px-10">
            {{ $slot }}
        </main>
    </div>
</body>

@include('components.partials.footer')