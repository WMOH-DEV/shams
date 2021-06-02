@extends('admin.main-layout')

@section('title')إعدادات النظام@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="nav-main-link-icon fas fa-tools"></i>
        </x-slot>
        <x-slot name="title">
            الإعدادت
        </x-slot>
    </x-top-nav>
@endsection

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h5 class="h6 mb-1">
                    <a href="{{route('admincp.index')}}">{{ __('global.main') }}</a>
                    <i class="fas fa-angle-left px-2"></i>
                    <span> إعدادات النظام</span>
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

            <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                @method('put')
                <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-sm-12  d-flex ">
                        <a href="{{route('admincp.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
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
                        <!-- right -->
                        <div class="table-responsive col-12 col-md-6">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>

                                <!-- Name -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="site_name">
                                            اسم الموقع*
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control @error('site_name') is-invalid @enderror unset"
                                               name="site_name" type="text"
                                               value="{{ $setting->site_name ?? 'لم يتم إدخال اسم الموقع' }}"
                                               id="site_name" placeholder="اسم الموقع، سيظهر في الطلبات">
                                    </td>
                                </tr>

                                <!-- site logo -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="site_logo">
                                            شعار الموقع
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="site_logo" class="form-group dropify"
                                                       data-height="65">
                                                <span class="text-danger" style="font-size: 0.7rem">اقصى حجم 1024
                                                        كيلوبايت - JPG أو PNG</span>
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ $setting->image_path }}"
                                                     alt="{{ $setting->site_name }}" style="height: 90px">
                                            </div>
                                    </td>
                                </tr>


{{--                                <!-- VAT ID -->--}}
{{--                                <tr style="font-size: 0.9rem">--}}
{{--                                    <th scope="row" style="width: 30%">--}}
{{--                                        <label for="vat_id">--}}
{{--                                            الرقم الضريبي--}}
{{--                                        </label>--}}
{{--                                    </th>--}}
{{--                                    <td class="font-w600">--}}
{{--                                        <input class="form-control @error('vat_id') is-invalid @enderror unset"--}}
{{--                                               name="vat_id" type="text"--}}
{{--                                               value="{{ $setting->vat_id }}"--}}
{{--                                               id="vat_id" placeholder="رقم التعريف الضريبي">--}}
{{--                                    </td>--}}
{{--                                </tr>--}}


                                </tbody>
                            </table>
                        </div>

                        <!-- left -->
                        <div class="table-responsive col-12 col-md-6">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>

                                <!-- website -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="site_web">
                                            رابط الموقع
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control @error('site_web') is-invalid @enderror unset"
                                               name="site_web" type="text"
                                               value="{{ $setting->site_web }}"
                                               id="site_web" placeholder="رابط الموقع">
                                    </td>
                                </tr>

                                <!-- Site Email -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="site_email">
                                            البريد الإلكتروني
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control @error('site_email') is-invalid @enderror unset"
                                               name="site_email" type="text"
                                               value="{{ $setting->site_email }}"
                                               id="site_email" placeholder="البريد الإلكتروني الرسمي">
                                    </td>
                                </tr>

                                <!-- Site phone -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="site_phone">
                                            الهاتف
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control @error('site_phone') is-invalid @enderror unset"
                                               name="site_phone" type="text"
                                               value="{{ $setting->site_phone }}"
                                               id="site_phone" placeholder="هاتف الموقع الرسمي">
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                <!-- middle -->
                <div class="row">
                    <div class="table-responsive col-12">
                        <table class="table table-bordered table-striped table-vcenter no-footer">
                            <tbody>
                            <tr style="font-size: 0.9rem">
                                <th scope="row" style="width: 20%">
                                    <label for="whatsapp">
                                        رقم الواتسآب
                                    </label>
                                </th>
                                <td class="font-w600">
                                    <div class="icon-font whats position-relative">
                                    <input class="form-control number_ltr @error('whatsapp') is-invalid @enderror unset"
                                           name="whatsapp" type="text"
                                           value="{{ $setting->whatsapp }}"
                                           id="whatsapp" placeholder="رقم الواتسآب">
                                    </div>
                                </td>

                                <th scope="row" style="width: 20%">
                                    <label for="facebook">
                                       رابط الفيسبوك
                                    </label>
                                </th>
                                <td class="font-w600">
                                    <div class="icon-font facebook position-relative">
                                    <input class="form-control number_ltr @error('facebook') is-invalid @enderror unset"
                                           name="facebook" type="text"
                                           value="{{ $setting->facebook }}"
                                           id="facebook" placeholder=" رابط الفيسبوك">
                                    </div>
                                </td>
                            </tr>
                            <tr style="font-size: 0.9rem">
                                <th scope="row" style="width: 20%">
                                    <label for="twitter">
                                        حساب تويتر
                                    </label>
                                </th>
                                <td class="font-w600">
                                    <div class="icon-font twitter position-relative">
                                    <input class="form-control @error('twitter') is-invalid @enderror unset"
                                           name="twitter" type="text"
                                           value="{{ $setting->twitter }}"
                                           id="twitter" placeholder="حساب تويتر">
                                    </div>
                                </td>

                                <th scope="row" style="width: 20%">
                                    <label for="instagram">
                                        حساب انستقرام
                                    </label>
                                </th>
                                <td class="font-w600">
                                    <div class="icon-font insta position-relative">
                                    <input class="form-control   @error('instagram') is-invalid @enderror unset"
                                           name="instagram" type="text"
                                           value="{{ $setting->instagram }}"
                                           id="instagram" placeholder=" رابط انستقرام">
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="footer_text">
                                            تعريف الموقع
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <div class="icon-font covid position-relative mb-2">
                                            <textarea class="js-maxlength form-control @error('footer_text') is-invalid @enderror unset"
                                                      name="footer_text" type="text"
                                                      maxlength="300"
                                                      data-always-show="true"
                                                      id="footer_text" placeholder="كلمة تظهر نهاية الموقع">{{ $setting->footer_text }}</textarea>
                                        </div>
                                        <span class="text-danger font-size-xs"> * جملة تعريفية تظهر أسفل الموقع في نهاية الصفحة الرئيسية.</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <span class="text-danger font-size-xs"> * جميع الحقول غير إلزامية عدا اسم الموقع، اذا كنت لا تريد اظهار أي معلومة، فقط عليك بتركها فارغه.</span>
            </div>
            </form>
        </div>
    </div>

@endsection



@section('css')
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/dropzone/dist/min/dropzone.min.css">
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/summernote/summernote-bs4.css">



@endsection

@section('js')
    <script src="{{asset('admin/assets')}}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/dropzone/dropzone.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/flatpickr/flatpickr.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>



    <script>

        jQuery(function () {
            Dashmix.helpers([
                'flatpickr',
                'datepicker',
                'summernote',
                 'maxlength',
            ]);
        });

        $('.js-summernote').summernote({
            height: 100,   //set editable area's height
        });


        jQuery(() => {
            $('.js-select2').niceSelect('destroy');
            $(".js-select2").select2({
                dir: "rtl",
                width: "100%",
                placeholder: "إختيار من متعدد",

            });

            $('.dropify').dropify({
                messages: {
                    'default': '',
                    'replace': 'اضغط للتبديل او اسحب صورة',
                    'remove': 'حذف',
                    'error': 'يوجد خطأ حدث'
                },
                error: {
                    'fileSize': 'حجم الملف  @{{ value }}أكبر من الحجم المسموح ',
                    'minWidth': 'عرض الصورة @{{ value }}} صغير جدا',
                    'maxWidth': 'عرض الصورة كبير جدا @{{ value }}}',
                    'minHeight': 'طول الصورة صغير جدا - @{{ value }}}px على الأقل',
                    'maxHeight': 'طول الصورة كبيرة جدا @{{ value }}px على الأقصى',
                    'imageFormat': 'صيغة الصورة  @{{ value }} غير مسموح بها '
                }
            });


        })
    </script>

@endsection
