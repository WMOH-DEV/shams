@extends('admin.main-layout')

@section('title') {{ $merchant->name }} تعديل@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="fa fa-users"></i>
        </x-slot>
        <x-slot name="title">
            تعديل بيانات {{$merchant->name}}
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
                  class="fas fa-angle-left px-2"></i><span> تعديل بيانات {{$merchant->name}}</span>

          </h5>
          <div class="block-options">
          <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                  data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
          <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                  data-action="pinned_toggle">
            <i class="si si-pin"></i>
          </button>
          <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option" data-action="state_toggle"
                  data-action-mode="demo">
            <i class="si si-refresh"></i>
          </button>
          <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                  data-action="content_toggle"><i class="si si-arrow-up"></i></button>
          <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option" data-action="close">
            <i class="si si-close"></i>
          </button>
        </div>
      </div>

      <div class="block-content block-content-full">
        <form action="{{route('merchants.update', $merchant->id)}}" method="post">
          @csrf
          @method('put')
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

          <div class="row">
            <div class="table-responsive col-12">
              <table class="table table-bordered table-striped table-hover table-vcenter no-footer">
                <tbody>

                <!-- client -->
                <tr style="font-size: 0.9rem">
                  <th scope="row" style="width: 20%">
                    <label for="name">
                      اسم التاجر
                    </label>
                  </th>
                  <td class="font-w600">
                    <input type="text"
                           id="name"
                           name="name"
                           required
                           class="form-control unset"
                           placeholder="اسم التاجر هنا"
                           value="{{  $merchant->name  }}">
                  </td>
                </tr>
                <!-- client email -->
                <tr style="font-size: 0.9rem">
                    <th scope="row" style="width: 20%">
                        <label for="email">
                            البريد الإلكتروني
                        </label>
                    </th>
                    <td class="font-w600">
                        <input type="email"
                               id="email"
                               name="email"
                               required
                               class="form-control unset"
                               placeholder="بريد التاجر"
                               value="{{  $merchant->email  }}">
                    </td>
                </tr>
                <!-- client -->
                <tr style="font-size: 0.9rem">
                    <th scope="row" style="width: 20%">
                        <label for="phone">
                            الجوال
                        </label>
                    </th>
                    <td class="font-w600">
                        <input type="text"
                               id="phone"
                               name="phone"
                               required
                               class="form-control unset"
                               placeholder="رقم الجوال"
                               value="{{  $merchant->phone  }}">
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
