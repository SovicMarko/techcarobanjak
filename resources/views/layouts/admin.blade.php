@include('inc.head')
<body class="">
    <div id="app">
        <header class="p-1">
            {{-- @include('inc.adminnavbar') --}}
            <div class="admin-naslov">@yield('naslov')</div>
            <div class="bg-dark p-1 admin-divajder"></div>
        </header>
        <main class="row">
            <div class="col col-md-2 admin-nav bg-dark">
            <h4 class="admin-logo">ADMIN PANEL</h4>
                @include('inc.adminnavbar')
            </div>
            <div class="col col-md-8 pt-4">
                @include('inc.greske')
                @yield('sadrzaj')
            </div>
            <div class="col col-md-2 pt-4 admin-nav">
                @include('inc.dashboard')
            </div>
        </main>
    </div>
</body>
</html>
