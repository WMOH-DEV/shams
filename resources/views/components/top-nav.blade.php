<header id="page-header">
    <!-- Header Content -->
    <div class="content-header justify-content-start" style="height: 4.5rem">
        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
        <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
        </button>
        <!-- END Toggle Sidebar -->

        <div class="icon px-3">
            {!! $icon ?? '<i class="fa fa-home"></i>' !!}
        </div>
        <div class="divider">|</div>
        <div class="page-title px-3">
            {{$title ?? 'الصفحة الرئيسية'}}
        </div>
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
