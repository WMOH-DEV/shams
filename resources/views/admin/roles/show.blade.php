@extends('admin.main-layout')

@section('title')مشاهدة دور@endsection

@section('css')

    <link rel="stylesheet" href="{{asset('assets')}}/js/plugins/select2/css/select2.min.css">

@endsection

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> إضافة دور جديد </h3>
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
                    <a href="{{route('roles.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
                      <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
                      رجوع
                    </a>
                  </div>
                </div>

                <!-- infos -->
                <div class="row">
                  <div class="table-responsive col-12">
                    <table class="table table-bordered table-striped table-vcenter no-footer">
                      <tbody>
                      <tr style="font-size: 0.9rem">
                        <th scope="row">
                          <label for="name">
                            اسم الدور
                          </label>
                        </th>
                        <td class="font-w600">
                          {{ $role->name }}
                        </td>
                      </tr>
                      <tr style="font-size: 0.9rem">
                        <th scope="row">
                          <label for="desc">صلاحيات الدور</label>
                        </th>
                        <td class="font-w600" style="width: 70%">
                          @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                              <span class="badge badge-pill badge-info py-1 my-1" style="font-size: 80%"><i class="fa fa-fw fa-info-circle"></i> {{ $v->name }}</span>
                            @endforeach
                          @endif
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

@section('js')


    <!-- Page JS Code -->

    <script src="{{asset('assets')}}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>


    <script>


        jQuery(() => {

            $(".js-select2").select2({
                dir: "rtl",
                width: "100%",
            });


        })

    </script>

@endsection


