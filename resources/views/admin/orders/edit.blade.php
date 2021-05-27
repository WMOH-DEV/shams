@extends('admin.main-layout')

@section('title')تعديل {{$order->order_number}}@endsection


@section('content')

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
                    <a class="nav-link" href="#order-status">تعديل حالة الطلب</a>
                </li>
                <li class="nav-item mr-auto">
                    <div class="block-options pl-2 pr-3">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                            <i class="si si-close"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="fullscreen_toggle"></button>
                    </div>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <!-- Order Details -->
                <div class="tab-pane fade fade-right show active" id="order-details" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-12  d-flex ">
                            <a href="{{route('orders.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
                                <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
                                رجوع
                            </a>
                            {{--                                <button type="submit"--}}
                            {{--                                        class="btn btn-alt-info mr-1 mb-3">--}}
                            {{--                                    <i class="far fa-save opacity-50 mr-1"></i>--}}
                            {{--                                    حفظ--}}
                            {{--                                </button>--}}
                        </div>
                    </div>

                    <!-- infos -->
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        رقم الطلب
                                    </th>
                                    <td class="font-w600">
                                        {{ $order->order_number }}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        إسم النشاط
                                    </th>
                                    <td class="font-w600">
                                        <a href="{{route('tickets.show', $order->ticket->id)}}">
                                            {{$order->ticket->name}}
                                        </a>
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        المدينة
                                    </th>
                                    <td class="font-w600">
                                        {{$order->ticket->city->name}}
                                    </td>
                                </tr>


                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        عدد الأشخاص
                                    </th>
                                    <td class="font-w600">
                                        {{$order->qty}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        تاريخ الفاعلية
                                    </th>
                                    <td class="font-w600">
                                        {{$order->ticket->date_party}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        موعد الفاعلية
                                    </th>
                                    <td class="font-w600">
                                        {{$order->ticket->hour_party}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        المبلغ المطلوب
                                    </th>
                                    <td class="font-w600">
                                        {{$order->total}}
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        طريقة الدفع
                                    </th>
                                    <td class="font-w600">
                                        @if ($order->payment_method == "الدفع عند الاستلام")
                                            <span class="badge badge-pill badge-secondary">الدفع عند الاستلام</span>
                                        @else
                                            <span class="badge badge-pill badge-info">أونلاين</span>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <!-- Customer Details -->
                <div class="tab-pane fade fade-right" id="customer-details" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-12  d-flex ">
                            <a href="{{route('orders.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
                                <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
                                رجوع
                            </a>
                            {{--                                <button type="submit"--}}
                            {{--                                        class="btn btn-alt-info mr-1 mb-3">--}}
                            {{--                                    <i class="far fa-save opacity-50 mr-1"></i>--}}
                            {{--                                    حفظ--}}
                            {{--                                </button>--}}
                        </div>
                    </div>

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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Status -->
                <div class="tab-pane fade fade-right" id="order-status" role="tabpanel">
                    <form action="{{route('orders.update', $order->id)}}" method="post">
                    @csrf
                    @method('put')
                    <!-- buttons -->
                        <div class="row">
                            <div class="col-sm-12  d-flex ">
                                <a href="{{route('orders.index')}}" type="button"
                                   class="btn btn-alt-secondary mr-1 mb-3">
                                    <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
                                    رجوع
                                </a>
                                <button type="submit"
                                        class="btn btn-alt-info mr-1 mb-3">
                                    <i class="far fa-save opacity-50 mr-1"></i>
                                    حفظ
                                </button>
                            </div>
                        </div>

                        <!-- status -->
                        <div class="row">
                            <div class="table-responsive col-12">
                                <table class="table table-bordered table-striped table-vcenter no-footer">
                                    <tbody>
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 20%">
                                            <label for="admin_status">حالة الطلب</label>
                                        </th>
                                        <td class="font-w600">
                                            <div class="select w-25">
                                                <select name="admin_status" id="admin_status"
                                                        class="js-select2 form-control @error('admin_status') is-invalid @enderror js-select2-enabled">
                                                    <option value="تم الدفع"
                                                            @if ($order->admin_status === 'تم الدفع') selected @endif>
                                                        تم الدفع
                                                    </option>
                                                    <option value=" لم يتم الدفع"
                                                            @if ($order->admin_status === 'لم يتم الدفع') selected @endif>
                                                        لم يتم الدفع
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Block Tabs Animated Slide Right -->
    </div>
@endsection




@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/select2/css/select2.min.css">

@endsection

@section('js')
    <script src="{{ asset('admin/assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>

    <script>
        jQuery(function () {
            $(".js-select2").select2({
                dir: "rtl",
                width: "100%",
                placeholder: "إختيار من متعدد",
            });
        })

    </script>

@endsection

