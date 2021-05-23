<!doctype html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>@yield('title')</title>

  <meta name="description" content="This Project created by WAEL MoHaMed">
  <meta name="author" content="WAEL">
  <meta name="robots" content="noindex, nofollow">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="This Project created by WAEL MoHaMed">
  <meta property="og:site_name" content="{{env('app_name')}}">
  <meta property="og:description" content="This Project created by WAEL MoHaMed">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="{{asset('admin/assets')}}/media/favicons/favicon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="{{asset('admin/assets')}}/media/favicons/favicon-192x192.png">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin/assets')}}/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->
    @livewireStyles

  <!-- Stylesheets -->
  <!-- Fonts and framework -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  @notifyCss
  @yield('css')
  <link rel="stylesheet" href="{{asset('admin/assets/css/dropify.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/css/nice-select.css')}}">
  <link rel="stylesheet" id="css-main" href="{{asset('admin/assets')}}/css/dashmix.min.css">
  <link rel="stylesheet" id="css-custom" href="{{asset('admin/assets')}}/css/main.css">
  <link rel="stylesheet" id="css-custom" href="{{asset('admin/assets')}}/css/main-app.css">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>


  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="{{asset('admin/assets')}}/css/themes/xwork.min.css"> -->
  <!-- END Stylesheets -->
</head>
<body>
<div id="page-loader" class="show"></div>
