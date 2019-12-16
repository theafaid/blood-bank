<!doctype html>
<html lang="ar" dir="ltr">
@include('layouts.partials.head')
<body class="">
    <div class="page" id="app">
        <example-component></example-component>
    <div class="page-main">
        @include('layouts.partials.navigation')
        <div class="container">
            @include('layouts.partials._messages')
        </div>
        @include('layouts.partials._page_title_box')
        @yield('content')
    </div>
    @include('layouts.partials.footer')
</div>
@include('layouts.partials.scripts')
</body>
</html>
