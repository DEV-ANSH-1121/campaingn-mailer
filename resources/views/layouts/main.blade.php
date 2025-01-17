<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="sb-nav-fixed">
    @include('layouts.navbar')

    <div id="layoutSidenav">
        @include('layouts.sidebar')

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('layouts.footer')

        </div>
    </div>
    @include('layouts.scripts')



</body>

</html>
