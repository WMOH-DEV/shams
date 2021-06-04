@extends('admin.main-layout')

@section('title')تقارير الموقع
@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="nav-main-link-icon fas fa-copy"></i>
        </x-slot>
        <x-slot name="title">
            التقارير
        </x-slot>
    </x-top-nav>
@endsection

@section('content')

    <div class="content">

        <!-- Simple -->

        <h5 class="h6 content-heading">
            <a href="{{route('admincp.index')}}">{{ __('global.main') }}</a>
            <i class="fas fa-angle-left px-2"></i>
            <span>تقارير الموقع</span>
        </h5>

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{route('clients.index')}}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            @if ($currentMonthUsers > 1)
                            <i class="fa fa-2x fa-arrow-up text-primary"></i>
                            @else
                                <i class="fa fa-2x fa-arrow-down text-primary"></i>
                            @endif
                        </div>
                        <div class="ml-3 text-right">
                            <p class="font-size-h3 font-w300 mb-0">
                                {{$currentMonthUsers}} +
                            </p>
                            <p class="text-muted mb-0">
                                عملاء هذا الشهر
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{route('merchants.index')}}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="far fa-2x fa-user-circle text-success"></i>
                        </div>
                        <div class="ml-3 text-right">
                            <p class="font-size-h3 font-w300 mb-0">
                                {{$currentMonthMerchants}} +
                            </p>
                            <p class="text-muted mb-0">
                                تُجار هذا الشهر
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{route('merchants.index')}}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <p class="font-size-h3 font-w300 mb-0">
{{--                               {{$totalOrders}}--}}
                                {{$confirmedMerchants}}
                            </p>
                            <p class="text-muted mb-0">
                                تجار مُعتمدين
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-chart-area text-danger"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="{{route('merchants.index')}}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <p class="font-size-h3 font-w300 mb-0">
                                {{$unConfirmedMerchants}}
                            </p>
                            <p class="text-muted mb-0">
                               تجار غير مُعتمدين
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-box text-warning"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-primary" href="{{route('orders.index')}}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                        </div>
                        <div class="ml-3 text-right">
                            <p class="text-white font-size-h3 font-w300 mb-0">
                                {{$sales}}
                            </p>
                            <p class="text-white-75 mb-0">
                                طلبات إعتمدت عرض
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-warning" href="{{route('orders.index')}}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <p class="text-white font-size-h3 font-w300 mb-0">
                                {{$debits}}
                            </p>
                            <p class="text-white-75 mb-0">
                                طلبات تستلم عروض
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-boxes text-black-50"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-danger" href="{{route('orders.index')}}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <p class="text-white font-size-h3 font-w300 mb-0">
                                {{$rushOrders}}
                            </p>
                            <p class="text-white-75 mb-0">
                                طلبات مستعجلة
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-chart-line text-black-50"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-success" href="{{route('orders.index')}}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>

                                <i class="fa fa-2x fa-arrow-alt-circle-up text-success-light"></i>

                        </div>
                        <div class="ml-3 text-right">
                            <p class="text-white font-size-h3 font-w300 mb-0">
                                {{$totalOrders}}
                            </p>
                            <p class="text-white-75 mb-0">
                                إجمالي الطلبات
                            </p>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-6">
                <div class="block block-rounded block-link-shadow">
                    <div class="block-content block-content-full">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="py-3">
                                    <div class="item item-circle bg-body-light mx-auto">
                                        <i class="fas fa-city text-primary"></i>
                                    </div>
                                    <p class="font-size-h3 font-w300 mt-3 mb-0">
                                        {{$totalAcceptedPrices}}
                                    </p>
                                    <p class="text-muted mb-0">
                                        عروض تم اعتمادها
                                    </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="py-3 border-right">
                                    <div class="item item-circle bg-body-light mx-auto">
                                        <i class="fa fa-check-double text-primary"></i>
                                    </div>
                                    <p class="font-size-h3 font-w300 mt-3 mb-0">
                                        {{$totalPrices}}
                                    </p>
                                    <p class="text-muted mb-0">
                                        إجمالي  عدد العروض
                                    </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="py-3 border-right">
                                    <div class="item item-circle bg-body-light mx-auto">
                                        <i class="fa fa-users text-primary"></i>
                                    </div>
                                    <p class="font-size-h3 font-w300 mt-3 mb-0">
                                        {{$totalUsers}}
                                    </p>
                                    <p class="text-muted mb-0">
                                        إجمالي الأعضاء
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block block-rounded bg-gd-sublime">
                    <div class="block-content block-content-full">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="py-3  ">
                                    <div class="item item-circle bg-black-25 mx-auto">
                                        <i class="fa fa-briefcase text-white"></i>
                                    </div>
                                    <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                                        {{$totalMerchants}}
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        إجمالي التجار
                                    </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="py-3">
                                    <div class="item item-circle bg-black-25 mx-auto">
                                        <i class="fa fa-chart-line text-white"></i>
                                    </div>
                                    <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                                        {{$totalMerchantsHasPrices}}
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        تجار قدموا عروض
                                    </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="py-3">
                                    <div class="item item-circle bg-black-25 mx-auto">
                                        <i class="fa fa-users text-white"></i>
                                    </div>
                                    <p class="text-white font-size-h3 font-w300 mt-3 mb-0">
                                        {{$totalUsersHasOrders}}
                                    </p>
                                    <p class="text-white-75 mb-0">
                                        عملاء قدموا طلبات
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Simple -->

        <!-- Charts -->
        <!-- jQuery Sparkline (.js-sparkline class is initialized in Helpers.sparkline() -->
        <!-- For more info and examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
        <h2 class="content-heading">رسم بياني</h2>
        <div class="row">
            <!-- Lines -->
            <div class="col-md-6 col-xl-4 invisible" data-toggle="appear">
                <a class="block block-rounded block-link-shadow" href="{{route('orders.index')}}">
                    <div class="block-content block-content-full d-flex justify-content-between">
                        <div class="mr-3">
                            <p class="font-size-h3 font-w300 mb-0">
                            </p>
                            <p class="text-muted mb-0">
                                طلبات خلال الاسبوع
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-arrow-alt-circle-up text-primary-lighter"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full overflow-hidden">
                        <!-- Sparkline Container -->
                        <span class="js-sparkline" data-type="line"
                              id="test"></span>

                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-4 invisible" data-toggle="appear">
                <a class="block block-rounded block-link-shadow" href="{{route('clients.index')}}">
                    <div class="block-content block-content-full d-flex justify-content-between">
                        <div class="mr-3">

                            <p class="text-muted mb-0">
                                تسجيلات  أعضاء خلال الاسبوع
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-users text-xeco-lighter"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full overflow-hidden">
                        <!-- Sparkline Container -->
                        <span class="js-sparkline" data-type="line"
                              id="user--js"
                              data-tooltip-suffix="Users"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-4 invisible" data-toggle="appear">
                <a class="block block-rounded block-link-shadow" href="{{route('merchants.index')}}">
                    <div class="block-content block-content-full d-flex justify-content-between">
                        <div class="mr-3">
                            <p class="text-muted mb-0">
                                تسجيلات  تجار خلال الاسبوع
                            </p>
                        </div>
                        <div>
                            <i class="fa fa-2x fa-box text-xmodern-lighter"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full overflow-hidden">
                        <!-- Sparkline Container -->
                        <span class="js-sparkline" data-type="line" id="saleWeek"
                              ></span>
                    </div>
                </a>
            </div>
            <!-- END Lines -->

        </div>
        <!-- END Charts -->
    </div>

@endsection




@section('js')
    <script src="{{asset('admin/assets')}}/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Page JS Helpers (Easy Pie Chart + jQuery Sparkline Plugins) -->
    <script>
        jQuery(function () {
            Dashmix.helpers(['easy-pie-chart', 'sparkline']);

            $.ajax({
                url: "{{ route('orders.ajax') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    let arr = [];
                    $.each(data, function (key, value) {
                        arr.push(value);
                    });
                    $('#test').sparkline(arr,{
                        width: '300',
                        height: '120'
                    });
                },
            });

            <!-- users -->
            $.ajax({
                url: "{{ route('users.ajax') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    let userArr = [];
                    $.each(data, function (key, value) {
                        userArr.push(value);
                    });
                    $('#user--js').sparkline(userArr,{
                        width: '300',
                        height: '120',
                        lineColor: '#ff0202',
                        fillColor: '#dddd6e'
                    });
                },
            });

            <!-- sales -->
            $.ajax({
                url: "{{ route('sales.ajax') }}",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    let userArr = [];
                    $.each(data, function (key, value) {
                        userArr.push(value);
                    });
                    $('#saleWeek').sparkline(userArr,{
                        width: '300',
                        height: '120',
                        lineColor: '#15008e',
                        fillColor: '#ffffff',
                        spotColor: '#2f00ef'
                    });
                },
            });

        });
    </script>


@endsection
