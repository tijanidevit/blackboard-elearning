<!DOCTYPE html>
<html lang="zxx">

@include('layout.head')


<body>

    <div class="main-wrapper">

        @include('layout.header')

        @yield('body')

        @include('layout.footer')

    </div>
    @include('layout.scripts')
</body>

</html>
