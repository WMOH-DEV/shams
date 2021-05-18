<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Techno') }}</title>
  <meta name="description" content="content">
  <meta name="author" content="{{config('app.coder')}}">
  <meta name="robots" content="noindex, nofollow">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="{{config('app.name')}}">
  <meta property="og:site_name" content="Dashmix">
  <meta property="og:description" content="{{config('app.content')}}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href=" {{asset('assets')}}/media/favicons/favicon.png">
  <link rel="icon" type="image/png" sizes="192x192" href=" {{asset('assets')}}/media/favicons/favicon-192x192.png">
  <link rel="apple-touch-icon" sizes="180x180" href=" {{asset('assets')}}/media/favicons/apple-touch-icon-180x180.png">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <!-- Fonts and  framework -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" id="css-main" href="{{asset('assets')}}/css/dashmix.min.css">
  <link rel="stylesheet" id="css-custom" href="{{asset('assets')}}/css/login.css">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>


  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href=" {{asset('assets')}}/css/themes/xwork.min.css"> -->
  <!-- END Stylesheets -->
</head>
<body>
<div id="page-container">

  <!-- Main Container -->
  <main id="main-container">
    @yield('content')
  </main>
  <!-- END Main Container -->
</div>
<!-- END Page Container -->

<!-- Terms Modal -->
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-success">
          <h3 class="block-title">Terms &amp; Conditions</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
          <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
        </div>
        <div class="block-content block-content-full text-right bg-light">
          <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Terms Modal -->


<!--

    Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
    to handle those dependencies through webpack. Please check out  {{asset('assets')}}/_js/main/bootstrap.js for more info.

    If you like, you could also include them separately directly from the  {{asset('assets')}}/js/core folder in the following
    order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

     {{asset('assets')}}/js/core/jquery.min.js
     {{asset('assets')}}/js/core/bootstrap.bundle.min.js
     {{asset('assets')}}/js/core/simplebar.min.js
     {{asset('assets')}}/js/core/jquery-scrollLock.min.js
     {{asset('assets')}}/js/core/jquery.appear.min.js
     {{asset('assets')}}/js/core/js.cookie.min.js
-->
<script src="{{asset('assets')}}/js/dashmix.core.min.js"></script>

<!--
     JS

    Custom functionality including Blocks/Layout API as well as other vital and optional helpers
    webpack is putting everything together at  {{asset('assets')}}/_js/main/app.js
-->
<script src="{{asset('assets')}}/js/dashmix.app.min.js"></script>

<!-- Page JS Plugins -->
<script src="{{asset('assets')}}/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="{{asset('assets')}}/js/pages/op_auth_signup.min.js"></script>
</body>
</html>

