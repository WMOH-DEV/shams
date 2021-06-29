@extends('admin.main-layout')

@section('title')مشاهدة مشرف@endsection

@section('css')

  <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/select2/css/select2.min.css">

@endsection

@section('content')

  <div class="content">
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title"> مشاهدة الملف الشخصي {{ $user->name }} </h3>
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

        <div class="row">
          <div class="col-sm-12  d-flex ">
            <a href="{{route('mods.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
              <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
              رجوع
            </a>
            <a type="submit" href="{{route('mods.edit' , $user->id)}}"
               class="btn btn-alt-info mr-1 mb-3">
              <i class="far fa-edit opacity-50 mr-1"></i>
              تعديل
            </a>
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
                    اسم المستخدم
                  </label>
                </th>
                <td class="font-w600">
                  {{$user->name}}
                </td>
              </tr>

              <tr style="font-size: 0.9rem">
                <th scope="row" style="width: 20%">
                  <label for="email">
                    البريد الإلكتروني
                  </label>
                </th>
                <td class="font-w600">
                  {{$user->email}}
                </td>
              </tr>
              <tr>
                <th scope="row" style="width: 20%">
                  <label for="roles">
                    دور المستخدم
                  </label>
                </th>
                <td class="font-w600">
                      <label class="badge badge-success">{{ $user->role->name}}</label>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection




