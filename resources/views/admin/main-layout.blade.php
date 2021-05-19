@include('admin.layouts.header')
<div id="page-container" class="sidebar-o enable-page-overlay sidebar-r side-scroll enable-cookies rtl-support">
{{--@include('admin.layouts.aside')--}}
@include('admin.layouts.sidebar')
    @yield('navbar')
{{--@include('admin.layouts.header_topbar')--}}
<!-- Main Container -->
  <main id="main-container">
    <x:notify-messages />
    <x-alert />
    @yield('content')

</main>
<!-- END Main Container -->
@include('admin.layouts.footer')



