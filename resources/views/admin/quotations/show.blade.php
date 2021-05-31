@extends('admin.main-layout')

@section('title')مشاهدة عرض رقم {{$quotation->id}}@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="fas fa-clipboard-list"></i>
        </x-slot>
        <x-slot name="title">
            مشاهدة عرض
        </x-slot>
    </x-top-nav>
@endsection

@section('content')

    <div class="content">
        <h5 class="h6 mb-1">
            <a href="{{route('admincp.index')}}">{{ __('global.main') }}</a>
            <i class="fas fa-angle-left px-2"></i>
            <a href="{{route('orders.index')}}">الطلبات</a>
            <i class="fas fa-angle-left px-2"></i>
            <a href="{{route('orders.show', $quotation->order->id)}}">طلب رقم {{$quotation->order->id}}</a>
            <i class="fas fa-angle-left px-2"></i>
            <a href="{{route('quotations.show', $quotation->order->id)}}">العروض المقدمة</a>
            <i class="fas fa-angle-left px-2"></i>
            <span>مشاهدة عرض رقم {{$quotation->id}}</span>
        </h5>
    </div>

    <div class="content">

        <!-- Block Tabs Animated Slide Right -->
        <div class="block block-rounded">
            <ul class="nav nav-tabs nav-tabs-block justify-content-end align-items-center" data-toggle="tabs"
                role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#quotation-details">بيانات العرض</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#customer-details">بيانات التاجر</a>
                </li>
                <li class="nav-item mr-auto">
                    <div class="block-options pl-2 pr-3">
                    </div>
                </li>

            </ul>
            <div class="block-content tab-content overflow-hidden">
                <div class="tab-pane fade fade-right show active" id="quotation-details" role="tabpanel">
                    @if ($quotation->piece_with_price)
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">أسعار القطع مع السعر</h3>
                            </div>
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-justify">{{$quotation->piece_with_price}}</p>
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
                                        المبلغ المطلوب
                                    </th>
                                    <td class="font-w500" style="width: 30%">
                                        {{ $quotation->total_price }}
                                    </td>
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        السعر كلي أم جزئي ؟
                                    </th>
                                    <td class="font-w500">
                                        {{ $quotation->price }}
                                    </td>
                                </tr>
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        المدينة
                                    </th>
                                    <td class="font-w500" style="width: 30%">
                                        {{$quotation->city->name}}
                                    </td>
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        مدة تجهيز الطلب
                                    </th>
                                    <td class="font-w500">
                                        {{$quotation->days == 0 ? 0 : $quotation->days . " يوم "}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th colspan="2" scope="row" class="bg-white">
                                        حالة القطعة <span
                                            class="text-danger">(قطعة بديلة من شركة أخرى أو من الوكالة)</span>
                                    </th>
                                    <td colspan="2" class="font-w500">
                                        {{$quotation->kind_product}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%" class="bg-white">
                                        تاريخ تقديم العرض
                                    </th>
                                    <td class="font-w500" style="width: 30%">
                                        {{$quotation->created_at->format('Y-m-d')}}
                                    </td>

                                    <th scope="row" style="width: 20%" class="bg-white">
                                        حالة العرض
                                    </th>
                                    <td class="font-w500">
                                        {{$quotation->isAccepted ? "تم قبوله" : "لم يتم إعتماده"}}
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
                                        اسم التاجر
                                    </th>
                                    <td class="font-w600">
                                        <a href="{{route('merchants.show', $quotation->user_id)}}">
                                            {{ $quotation->merchant->name }}
                                        </a>
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        البريد الإلكتروني
                                    </th>
                                    <td class="font-w600">
                                        <a href="mailto:{{$quotation->merchant->email}}">
                                            {{$quotation->merchant->email}}
                                        </a>
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        الهاتف
                                    </th>
                                    <td class="font-w600">
                                        {{$quotation->merchant->phone}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        المدينة
                                    </th>
                                    <td class="font-w600">
                                        {{$quotation->merchant->city->name}}
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Slider with multiple images and center mode -->
                @if ($quotation->image2)
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
                                <img class="img-fluid" style="height:250px" src="{{ asset("uploads/$quotation->image") }}"
                                     alt="{{ $quotation->name }}">
                            </div>
                            <div>
                                <img class="img-fluid" style="height:250px" src="{{ asset("uploads/$quotation->image2") }}"
                                     alt="{{ $quotation->name }}">
                            </div>
                            @if ( $quotation->image3 )
                                <div>
                                    <img class="img-fluid" style="height:250px"
                                         src="{{ asset("uploads/$quotation->image3") }}"
                                         alt="{{ $quotation->name }}">
                                </div>
                            @endif
                            @if ($quotation->image4)
                                <div>
                                    <img class="img-fluid" style="height:250px"
                                         src="{{ asset("uploads/$quotation->image4") }}"
                                         alt="{{ $quotation->name }}">
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
