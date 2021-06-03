@extends('admin.main-layout')

@section('title')مشاهدة {{$order->order_number}}@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="fas fa-clipboard-list"></i>
        </x-slot>
        <x-slot name="title">
            مشاهدة طلب
        </x-slot>
    </x-top-nav>
@endsection

@section('content')

    <div class="content">
        <h5 class="h6 mb-1">
            <a href="{{route('admincp.index')}}">{{ __('global.main') }}</a>
            <i class="fas fa-angle-left px-2"></i>
            <span><a href="{{route('orders.index')}}"> الطلبات</a></span>
            <i class="fas fa-angle-left px-2"></i>
            <span>طلب رقم {{$order->id}}</span>
        </h5>
    </div>

    <div class="content">

        <!-- Block Tabs Animated Slide Right -->
        <div class="block block-rounded">
            <ul class="nav nav-tabs nav-tabs-block justify-content-end align-items-center" data-toggle="tabs"
                role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#order-details">بيانات الطلب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#customer-details">بيانات العميل</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quotations.show', $order)}}"
                       onclick="location.href='{{route('quotations.show', $order)}}'" type="button" class="nav-link">العروض
                        المقدمة</a>
                </li>
                <li class="nav-item mr-auto">
                    <div class="block-options pl-2 pr-3">
                            <a onclick="location.href='{{ $previous ? route("orders.show", $previous->id) : '#'}}'" type="button"
                               class="btn-sm btn btn-outline-info {{!$previous ? 'disabled' : ''}}">
                                <i class="si si-arrow-right"></i>
                                <span> السابق</span>
                            </a>

                        @if ($previous AND $next)
                                <span class="mx-1">|</span>
                        @endif

                            <a onclick="location.href='{{$next ? route("orders.show", $next->id) : '#'}}'" type="button"
                               class="btn-sm btn btn-outline-info {{!$next ? 'disabled' : ''}}">
                                <span> التالي</span>
                                <i class="si si-arrow-left"></i>
                            </a>
                    </div>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <!-- Order Details -->
                <div class="tab-pane fade fade-right show active" id="order-details" role="tabpanel">
                    <div class="row">

                        <ul class="inline-flex
                         justify-content-between
                          w-75 mx-auto
                           my-5
                           progress-start
                           {{ $order->accepted_price ? 'progress-mid' : '' }}
                            position-relative">
                            <li class="progress-point-start">مرحلة تلقي العروض</li>
                            <li class="progress-point-mid">مرحلة تجهيز الطلب</li>
                            <li class="progress-point-end">مرحلة التسليم</li>
                        </ul>
                    </div>
                    @if ($order->details)
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">تفاصيل الطلب</h3>
                            </div>
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-justify">{{$order->details}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
                <!-- infos -->
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        رقم الطلب
                                    </th>
                                    <td class="font-w500" style="width: 30%">
                                        {{ $order->id }}
                                    </td>
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        عنوان الطلب
                                    </th>
                                    <td class="font-w500">
                                        {{ $order->name }}
                                    </td>
                                </tr>
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        المدينة
                                    </th>
                                    <td class="font-w500" style="width: 30%">
                                        {{$order->user->city->name}}
                                    </td>
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        الشركة المطلوبة
                                    </th>
                                    <td class="font-w500">
                                        {{$order->company_car}}
                                    </td>
                                </tr>


                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        الموديل
                                    </th>
                                    <td class="font-w500" style="width: 30%">
                                        {{$order->model}}
                                    </td>
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        سنة الموديل
                                    </th>
                                    <td class="font-w500">
                                        {{$order->year}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        حالة القطعة
                                    </th>
                                    <td class="font-w500" style="width: 30%">
                                        {{$order->state_piece}}
                                    </td>
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        طريقة الإستلام
                                    </th>
                                    <td class="font-w500">
                                        {{$order->receipt}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        تاريخ الطلب
                                    </th>
                                    <td class="font-w500" style="width: 30%">
                                        {{$order->created_at->format('Y-m-d')}}
                                    </td>

                                    <th scope="row" style="width: 20%" class="bg-white">
                                        التوصيل
                                    </th>
                                    <td class="font-w500">
                                        {{$order->delivery}}
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <!-- Customer Details -->
                <div class="tab-pane fade fade-right" id="customer-details" role="tabpanel">
                    <!-- customer -->
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        اسم العميل
                                    </th>
                                    <td class="font-w600">
                                        <a href="{{route('clients.show', $order->user->id)}}">
                                            {{ $order->user->name }}
                                        </a>
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        البريد الإلكتروني
                                    </th>
                                    <td class="font-w600">
                                        <a href="mailto:{{$order->user->email}}">
                                            {{$order->user->email}}
                                        </a>
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        الهاتف
                                    </th>
                                    <td class="font-w600">
                                        {{$order->user->phone}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        المدينة
                                    </th>
                                    <td class="font-w600">
                                        {{$order->user->city->name}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Slider with multiple images and center mode -->
                @if ($order->image2)
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                <i class="fa fa-play fa-fw text-primary"></i> معرض الصور
                            </h3>
                        </div>
                        <div class="js-slider slick-nav-black slick-nav-hover responsive" dir="ltr" data-dots="true"
                             data-arrows="true" data-slides-to-show="3" data-center-mode="true" data-autoplay="true"
                             data-autoplay-speed="3000">
                            <div>
                                <img class="img-fluid" style="height:250px" src="{{ asset("uploads/$order->image") }}"
                                     alt="{{ $order->name }}">
                            </div>
                            <div>
                                <img class="img-fluid" style="height:250px" src="{{ asset("uploads/$order->image2") }}"
                                     alt="{{ $order->name }}">
                            </div>
                            @if ( $order->image3 )
                                <div>
                                    <img class="img-fluid" style="height:250px"
                                         src="{{ asset("uploads/$order->image3") }}"
                                         alt="{{ $order->name }}">
                                </div>
                            @endif
                            @if ($order->image4)
                                <div>
                                    <img class="img-fluid" style="height:250px"
                                         src="{{ asset("uploads/$order->image4") }}"
                                         alt="{{ $order->name }}">
                                </div>
                            @endif
                        </div>
                    </div>
            @endif
            <!-- END Slider with multiple images and center mode -->

            </div>
        </div>
        <!-- END Block Tabs Animated Slide Right -->
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/slick-carousel/slick.css">
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/slick-carousel/slick-theme.css">
@endsection
@section('js')
    <script src="{{ asset('admin/assets') }}/js/plugins/slick-carousel/slick.min.js"></script>
    <script>
        jQuery(function () {
            Dashmix.helpers('slick');
        });

    </script>

@endsection
