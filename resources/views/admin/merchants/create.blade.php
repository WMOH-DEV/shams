@extends('admin.main-layout')

@section('title')إضافة تاجر@endsection


@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="fa fa-user"></i>
        </x-slot>
        <x-slot name="title">
            تاجر جديد
        </x-slot>
    </x-top-nav>
@endsection

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h5 class="h6 mb-1">
                    <a href="{{route('admincp.index')}}">{{ __('global.main') }}</a><i
                        class="fas fa-angle-left px-2"></i><a href="{{route('merchants.index')}}">قائمة التجار</a><i
                        class="fas fa-angle-left px-2"></i><span>إضافة تاجر جديد</span>
                </h5>
                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="state_toggle"
                            data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>

            <div class="block-content block-content-full">

                <form action="{{route('merchants.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12  d-flex ">
                            <a href="{{route('merchants.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
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

                    <!-- infos -->
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="name">
                                            اسم التاجر
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control  unset"
                                               name="name" type="text"
                                               value="{{old('name')}}"
                                               id="name" placeholder="اسم التاجر الجديد">
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="email">
                                            البريد الإلكتروني
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control  unset"
                                               name="email" type="email"
                                               value="{{old('email')}}"
                                               id="email" placeholder="بريد التاجر الإلكتروني ">
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="password">
                                            كلمة المرور
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control  unset"
                                               name="password" type="password"
                                               id="password" placeholder="كلمة السر - لا تقل عن 8 حروف">
                                        <span class="font-size-xs text-danger font-w700 ">* لا تقل عن 8 حروف أو ارقام</span>
                                    </td>
                                </tr>


                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="confirm-password">
                                            تأكيد كلمة المرور
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control  unset"
                                               name="confirm-password" type="password"
                                               id="confirm-password" placeholder="تأكيد كلمة المرور السابقة">
                                    </td>
                                </tr>


                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="phone">
                                            رقم الجوال
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control  unset"
                                               name="phone" type="text"
                                               value="{{old('phone')}}"
                                               id="phone" placeholder="رقم الجوال">
                                    </td>
                                </tr>

                                <!-- client city -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row">
                                        <label for="city_id">
                                            المدينة
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <select name="city_id" id="city_id"
                                                class="js-select2 form-control @error('city_id') is-invalid @enderror js-select2-enabled">
                                            <option></option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <span class="font-size-xs text-danger font-w700 mr-4">* كل الحقول السابقة هي حقول إلزامية</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/select2/css/select2.min.css">
@endsection


@section('js')


    <!-- Page JS Code -->

    <script src="{{asset('admin/assets')}}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>


    <script>


        jQuery(() => {

            $(".js-select2").select2({
                dir: "rtl",
                width: "100%",
                placeholder: "اختر المدينة"
            });


        })

    </script>

@endsection
