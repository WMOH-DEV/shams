<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div>
        <div class="content-header my-3 d-flex justify-content-center align-items-center">
            <!-- Logo -->
            <a class="font-w600 text-white tracking-wide" href="">
                <img src="{{asset('admin/assets/media/imgs/logo.png')}}" style="height:100px" alt="">
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler"
                   data-class="fa-toggle-off fa-toggle-on"
                   onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');"
                   href="javascript:void(0)">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </a>
                <!-- END Toggle Sidebar Style -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-dark ml-2" data-toggle="layout" data-action="sidebar_close"
                   href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">

        <div class="user-info my-1 anime pointer">
            <div class="row align-items-center p-2">
                <div class="col-3 pl-0">
                    <img class="rounded-circle user-image" src="{{asset('admin/assets/media/avatars/avatar0.jpg')}}" alt="">
                </div>
                <div class="col-7 pl-0" style="font-size: 14px">إسم المستخدم</div>
                <div class="col-2"><i class="fas fa-chevron-left left-arrow"></i></div>
            </div>
        </div>

        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="/admincp">
                        <i class="nav-main-link-icon fa fa-home"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.main_page') }}</span>
                    </a>
                </li>


            <!-- users -->
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon fas fa-users"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.users') }}</span>
                    </a>
                </li>

                <!-- merchants -->
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon fas fa-users"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.Merchants') }}</span>
                    </a>
                </li>

                <!-- Orders -->
                <li class="nav-main-item">
                    <a class="nav-main-link " href="#">
                        <i class="nav-main-link-icon fas fa-calendar-week"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.orders') }}</span>
                    </a>
                </li>


                <li class="nav-main-heading">{{ __('sidebar.admin_sections') }}</li>

                            @can('إدارة المشرفين')
                                <!-- Users -->
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                        aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fas fa-users-cog"></i>
                                        <span class="nav-main-link-name">إدارة مشرفين</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        @can('مشاهدة المشرفين')
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="{{ route('mods.index') }}">
                                                    <span class="nav-main-link-name">قائمة المشرفين</span>
                                                </a>
                                            </li>
                                        @endcan

                                        @can('إضافة مشرف')
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="{{ route('mods.create') }}">
                                                    <span class="nav-main-link-name">إضافة مشرف جديد</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('تعديل الصلاحيات')
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="{{ route('roles.index') }}">
                                                    <span class="nav-main-link-name">التحكم بالأدوار والصلاحيات</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

            <!-- Reports -->
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon far fa-flag"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.pages') }}</span>
                    </a>
                </li>


                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon far fa-copy"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.reports') }}</span>
                    </a>
                </li>



                <!-- System -->
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                       aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-tools"></i>
                        <span class="nav-main-link-name">{{ __('sidebar.system_settings') }}</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <!-- Home -->
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                                <span class="nav-main-link-name">واجهة الموقع</span>
                            </a>
                        </li>
                    </ul>
                </li>

                                <!-- Support -->
{{--                                <li class="nav-main-item">--}}
{{--                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"--}}
{{--                                        aria-expanded="false" href="#">--}}
{{--                                        <i class="nav-main-link-icon fas fa-headset"></i>--}}
{{--                                        <span class="nav-main-link-name">{{ __('layouts/sidebar.help_support') }}</span>--}}
{{--                                    </a>--}}
{{--                                    <ul class="nav-main-submenu">--}}
{{--                                        <li class="nav-main-item">--}}
{{--                                            <a class="nav-main-link" href="javascript:void(0)">--}}
{{--                                                <span class="nav-main-link-name">{{ __('layouts/sidebar.text_explanation') }}</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}

{{--                                        <li class="nav-main-item">--}}
{{--                                            <a class="nav-main-link" href="javascript:void(0)">--}}
{{--                                                <span--}}
{{--                                                    class="nav-main-link-name">{{ __('layouts/sidebar.visual_explanation') }}</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-main-item">--}}
{{--                                            <a class="nav-main-link" href="javascript:void(0)">--}}
{{--                                                <span class="nav-main-link-name">{{ __('layouts/sidebar.contact_us') }}</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}

{{--                                    </ul>--}}
{{--                                </li>--}}


            </ul>


            <div class="nav-main-item go_to_site">
                <a  href="#">
                    <i class="nav-main-link-icon fas fa-globe"></i>
                    <span class="nav-main-link-name" style="color: #0A63A5">{{ __('sidebar.go_to_site') }}</span>
                </a>
            </div>

            <div class="nav-main-item btn-hover log_out">
                <a href="#">
                    <i class="nav-main-link-icon fas fa-sign-out-alt " ></i>
                    <span class="nav-main-link-name noselect">{{ __('sidebar.log_out') }}</span>
                </a>
            </div>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
