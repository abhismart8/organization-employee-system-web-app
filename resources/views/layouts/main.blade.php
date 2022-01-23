<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('partials.head')
    </head>

    <body>

        <div>

            {{-- @include('partials.header') --}}
            <!-- Optional Header, can be pushed from specific page -->
            @stack('header')

            <!-- Main content -->
            @yield('content')
            <!-- Main content End-->

            @include('partials.footer')

        </div>

        @include('partials.footer-scripts')

    </body>
</html>
