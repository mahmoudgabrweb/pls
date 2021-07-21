<!DOCTYPE html>
<html lang="ar">
    <head>
        @include('components.meta')
    </head>
<body>
    <!--page start-->
    <div class="page">
        <!-- preloader start -->
        <div id="preloader">
          <div id="status">&nbsp;</div>
        </div>
        <!-- preloader end -->
        @include('components.header')
        
        @yield('content')

        @include('components.sub_footer')
    </div><!-- page end -->
    <!-- END LOADER -->
    @include('components.footer')

    @yield('scripts')
</body>
</html>

