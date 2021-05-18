<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Right Section -->
        <div>
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Open Search Section -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block droid">{{ __('top-nav.search') }}</span>
            </button>
            <!-- END Open Search Section -->
        </div>
        <!-- END Right Section -->

        <!-- Left Section -->
        <div>
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block"> Wael </span>
                    <i class="fa fa-fw fa-angle-down mr-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                        {{ __('top-nav.user_option') }}
                    </div>
                    <div class="p-2 text-right">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="far fa-fw fa-user ml-1"></i> {{ __('top-nav.profile') }}
                        </a>
                        <div role="separator" class="dropdown-divider"></div>

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="far fa-fw fa-building ml-1"></i> {{ __('top-nav.settings') }}
                        </a>
                        <!-- END Side Overlay -->

                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#route('logout')">
                            <i class="far fa-fw fa-arrow-alt-circle-left ml-1"></i> {{ __('top-nav.sign_out') }}
                        </a>

                        <form id="logout-form" action="#route('logout')" method="POST">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

        </div>
        <!-- END Left Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header bg-primary">
        <div class="content-header">
            <form class="w-100" method="POST">
                <div class="input-group">
                    <div class="input-group-apend">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-primary rounded-right" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control border-0 rounded-left rtl" placeholder="{{ __('top-nav.search_or_esc') }}.." id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <div id="page-header-loader" class="overlay-header bg-primary-darker">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
