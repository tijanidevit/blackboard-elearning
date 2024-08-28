<!DOCTYPE html>
<html lang="zxx">

@include('layout.head')

<body>

    {{-- <div class="preloader-area">
        <div class="spinner">
            <div class="inner">
                <div class="disc"></div>
                <div class="disc"></div>
                <div class="disc"></div>
            </div>
        </div>
    </div> --}}

    @include('layout.header')

    @yield('body')

    @include('layout.footer')
    @include('layout.scripts')




</body>

</html>

