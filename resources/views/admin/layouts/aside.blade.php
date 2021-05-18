<!-- Side Overlay-->
<aside id="side-overlay">
  <!-- Side Header -->
  <div class="bg-image" style="background-image: url('{{asset('admin/assets')}}/media/various/bg_side_overlay_header.jpg');">
    <div class="bg-primary-op">
      <div class="content-header">
        <!-- User Avatar -->
        <a class="img-link ml-1" href="javascript:void(0)">
          <img class="img-avatar img-avatar48" src="{{asset('admin/assets')}}/media/avatars/avatar10.jpg" alt="">
        </a>
        <!-- END User Avatar -->

        <!-- User Info -->
        <div class="mr-2">
          <a class="text-white font-w600" href="javascript:void(0)">John Doe</a>
          <div class="text-white-75 font-size-sm">Administrator</div>
        </div>
        <!-- END User Info -->

        <!-- Close Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <a class="mr-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
          <i class="fa fa-times-circle"></i>
        </a>
        <!-- END Close Side Overlay -->
      </div>
    </div>
  </div>
  <!-- END Side Header -->

  <!-- Side Content -->
  <div class="content-side">
    <!-- Side Overlay Tabs -->
    <div class="block block-transparent pull-x pull-t">
      <ul class="nav nav-tabs nav-tabs-block nav-justified pr-0" data-toggle="tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#so-settings">
            <i class="fa fa-fw fa-cog"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#so-people">
            <i class="far fa-fw fa-user-circle"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#so-profile">
            <i class="far fa-fw fa-edit"></i>
          </a>
        </li>
      </ul>
      <div class="block-content tab-content overflow-hidden">
        <!-- Settings Tab -->
        <div class="tab-pane pull-x fade fade-up show active" id="so-settings" role="tabpanel">
          <div class="block mb-0">
            <!-- Color Themes -->
            <!-- Toggle Themes functionality initialized in Template._uiHandleTheme() -->
            <div class="block-content block-content-sm block-content-full bg-body">
              <span class="text-uppercase font-size-sm font-w700">Color Themes</span>
            </div>
            <div class="block-content block-content-full">
              <div class="row gutters-tiny text-center">
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-default" data-toggle="theme" data-theme="default" href="#">
                    Default
                  </a>
                </div>
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-xwork" data-toggle="theme" data-theme="assets/css/themes/xwork.min.css" href="#">
                    xWork
                  </a>
                </div>
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-xmodern" data-toggle="theme" data-theme="assets/css/themes/xmodern.min.css" href="#">
                    xModern
                  </a>
                </div>
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-xeco" data-toggle="theme" data-theme="assets/css/themes/xeco.min.css" href="#">
                    xEco
                  </a>
                </div>
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-xsmooth" data-toggle="theme" data-theme="assets/css/themes/xsmooth.min.css" href="#">
                    xSmooth
                  </a>
                </div>
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-xinspire" data-toggle="theme" data-theme="assets/css/themes/xinspire.min.css" href="#">
                    xInspire
                  </a>
                </div>
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-xdream" data-toggle="theme" data-theme="assets/css/themes/xdream.min.css" href="#">
                    xDream
                  </a>
                </div>
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-xpro" data-toggle="theme" data-theme="assets/css/themes/xpro.min.css" href="#">
                    xPro
                  </a>
                </div>
                <div class="col-4 mb-1">
                  <a class="d-block py-3 text-white font-size-sm font-w600 bg-xplay" data-toggle="theme" data-theme="assets/css/themes/xplay.min.css" href="#">
                    xPlay
                  </a>
                </div>
              </div>
            </div>
            <!-- END Color Themes -->

            <!-- Sidebar -->
            <div class="block-content block-content-sm block-content-full bg-body">
              <span class="text-uppercase font-size-sm font-w700">Sidebar</span>
            </div>
            <div class="block-content block-content-full">
              <div class="row gutters-tiny text-center">
                <div class="col-6 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">Dark</a>
                </div>
                <div class="col-6 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">Light</a>
                </div>
              </div>
            </div>
            <!-- END Sidebar -->

            <!-- Header -->
            <div class="block-content block-content-sm block-content-full bg-body">
              <span class="text-uppercase font-size-sm font-w700">Header</span>
            </div>
            <div class="block-content block-content-full">
              <div class="row gutters-tiny text-center">
                <div class="col-6 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">Dark</a>
                </div>
                <div class="col-6 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">Light</a>
                </div>
                <div class="col-6 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_mode_fixed" href="javascript:void(0)">Fixed</a>
                </div>
                <div class="col-6 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="header_mode_static" href="javascript:void(0)">Static</a>
                </div>
              </div>
            </div>
            <!-- END Header -->

            <!-- Content -->
            <div class="block-content block-content-sm block-content-full bg-body">
              <span class="text-uppercase font-size-sm font-w700">Content</span>
            </div>
            <div class="block-content block-content-full">
              <div class="row gutters-tiny text-center">
                <div class="col-6 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_boxed" href="javascript:void(0)">Boxed</a>
                </div>
                <div class="col-6 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_narrow" href="javascript:void(0)">Narrow</a>
                </div>
                <div class="col-12 mb-1">
                  <a class="d-block py-3 bg-body-dark font-w600 text-dark" data-toggle="layout" data-action="content_layout_full_width" href="javascript:void(0)">Full Width</a>
                </div>
              </div>
            </div>
            <!-- END Content -->
          </div>
        </div>
        <!-- END Settings Tab -->

        <!-- People -->
        <div class="tab-pane pull-x fade fade-up" id="so-people" role="tabpanel">
          <div class="block mb-0">
            <!-- Section -->
            <div class="block-content block-content-sm block-content-full bg-body">
              <span class="text-uppercase font-size-sm font-w700">Section</span>
            </div>
            <div class="block-content">
              <p>
                ...
              </p>
            </div>
            <!-- Section -->
          </div>
        </div>
        <!-- END People -->

        <!-- Profile -->
        <div class="tab-pane pull-x fade fade-up" id="so-profile" role="tabpanel">
          <div class="block mb-0">
            <!-- Section -->
            <div class="block-content block-content-sm block-content-full bg-body">
              <span class="text-uppercase font-size-sm font-w700">Section</span>
            </div>
            <div class="block-content">
              <p>
                ...
              </p>
            </div>
            <!-- Section -->
          </div>
        </div>
        <!-- END Profile -->
      </div>
    </div>
    <!-- END Side Overlay Tabs -->
  </div>
  <!-- END Side Content -->
</aside>
<!-- END Side Overlay -->
