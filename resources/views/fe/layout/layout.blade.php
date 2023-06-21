<!DOCTYPE html>
<html lang="en">

<head>
    @include('fe.layout.head')
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    @include('fe.layout.header')

    @yield('contents')
    
    @include('fe.layout.footer')
</body>

</html>
