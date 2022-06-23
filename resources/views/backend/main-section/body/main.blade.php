<!DOCTYPE html>
<html lang="en">
    <head>

        @include('backend.code-section.js.head-js.head')

    </head>

    <body data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        @php
        $setting = DB::table('settings')->first();  
        @endphp
        
        <!-- Begin page -->
        <div id="wrapper">

            @include('backend.main-section.body.header.header')

            @include('backend.main-section.body.sidebar.sidebar')


            <!-- Start Page Content here -->


            <div class="content-page">


                @yield('main')
                @include('backend.main-section.body.footer.footer')


            </div>

            <!-- End Page content -->

        </div>
        <!-- END wrapper -->

        @include('backend.code-section.js.main-js.main')
        @yield('scripts')
        
    </body>
</html>