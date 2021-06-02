@extends('admin.main-layout')

@section('title') إضافة صفحة جديدة@endsection


@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="nav-main-link-icon fas fa-flag"></i>
        </x-slot>
        <x-slot name="title">
            إنشاء صفحة
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
                    <a href="{{route('pages.index')}}">صفحات الموقع</a>
                    <i class="fas fa-angle-left px-2"></i>
                    <span> إضافة صفحة جديدة</span>
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

                <form action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12  d-flex ">
                            <a href="{{route('pages.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
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
                    <!-- Page form -->
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>

                                <!-- Name -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="name">
                                            اسم الصفحة
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control @error('name') is-invalid @enderror unset"
                                               name="name" type="text"
                                               value="{{old('name')}}"
                                               id="name" placeholder="عنوان الصفحة">
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row">
                                        <label for="type">
                                            مكان الصفحة
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <select
                                            name="type"
                                            id="type"
                                            class="js-select2 form-control js-select2-enabled">
                                            <option value="header">أعلى الموقع</option>
                                            <option value="footer">نهاية الموقع</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row">
                                         تفعيل الصفحة

                                    </th>
                                    <td class="font-w600">
                                        <div class="custom-control custom-switch custom-control-primary custom-control-lg">
                                            <input type="checkbox" class="custom-control-input" id="active" name="active" checked="">
                                            <label class="custom-control-label" for="active"></label>
                                        </div>

                                    </td>
                                </tr>

                                <tr style="font-size: 0.9rem">
                                    <th scope="row">
                                        <label for="sort_order">
                                            ترتيب الصفحة
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control @error('sort_order') is-invalid @enderror unset"
                                               name="sort_order" type="number"
                                               value="{{old('sort_order') ?? '0'}}"
                                               id="sort_order" placeholder="0">
                                    </td>
                                </tr>

                                <!-- Description -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="desc">
                                           الوصف
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <textarea class="js-summernote @error('desc') is-invalid @enderror" id="desc" name="desc">{{ old('desc') }}</textarea>
                                    </td>
                                </tr>

                                <!-- content  -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="content">
                                           المحتوى
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <textarea class="js-summernote2" id="content" name="content">{{old('content')}}</textarea>
                                    </td>
                                </tr>

                                <!-- image  -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="image">
                                           صورة الصفحة
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input type="file" name="image"
                                               class="form-group dropify"
                                               data-max-file-size="1M"
                                               data-height="70">
                                        <span class="text-danger" style="font-size: 0.7rem">الحجم المسموح هو 1024 كيلوبايت -  JPG أو PNG</span>
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

@endsection



@section('css')
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/select2/css/select2.min.css">

@endsection

@section('js')
    <script src="{{asset('admin/assets')}}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/summernote/summernote-bs4.min.js"></script>


    <script>

            jQuery(function () {
                Dashmix.helpers([
                    'flatpickr',
                    'datepicker',
                    'summernote',
                    // 'maxlength',
                ]);
            });

        $('.js-summernote').summernote({
            height: 100,   //set editable area's height
        });

        $('.js-summernote2').summernote({
            height: 250,   //set editable area's height
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
