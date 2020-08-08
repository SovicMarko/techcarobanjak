@include('inc.head')
<body>
    <div id="app">
        <korpa-modal></korpa-modal>
        {{-- <prikaz-korpe></prikaz-korpe> --}}
        <header>
            @include('inc.navbar')
        </header>
        @yield('slajder')
        <main class="container mt-5">
            @include('inc.greske')
            @yield('sadrzaj')
        </main>
        <section class="bg-dark ">
            @yield('izdvojeno')
        </section>
    </div>
</body>
</html>
