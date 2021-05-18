@extends('admin.main-layout')

@section('title')قائمة المشرفين@endsection

@section('css')

    <link rel="stylesheet" href="{{asset('assets')}}/js/plugins/select2/css/select2.min.css">

@endsection

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> قائمة المشرفين </h3>
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
                <div class="col-sm-12 col-md-6">
                  @can('إضافة مشرف')
                  <a href="{{route('mods.create')}}" type="button"
                          class="btn btn-outline-success mr-1 mb-3 btn-sm">
                    <i class="fa fa-fw fa-plus mr-1"></i>
                    مشرف جديد
                  </a>
                    @endcan
                </div>

              </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped table-vcenter"
                            role="grid" >
                        <thead style="font-size: 0.7rem">
                        <tr>
                            <th class="text-center" style="width: 2%">#</th>
                            <th>إسم المشرف</th>
                            <th>البريد</th>
                            <th>الدور</th>
                            <th class="text-center" style="width: 100px;">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($data as $index => $user)
                          <tr>
                            <td class="text-center" style="width: 2%">{{ $index+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                            <td>{{ $v }}</td>
                              @endforeach
                          @endif
                            <!-- actions -->
                            <td class="text-center" style="width: 100px;">
                              <div class="btn-group">

                              @can('إضافة مشرف')
                                <!-- Edit -->
                                <a  href="{{ route('mods.edit',$user->id) }}" type="button"
                                   class="btn btn-sm btn-primary js-tooltip-enabled btn-right"
                                   title="تعديل" data-original-title="Edit">
                                  <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endcan


                                <!-- view -->
                                <a href="{{ route('mods.show',$user->id) }}" type="button" class="btn btn-sm btn-primary js-tooltip-enabled btn-mid"
                                   data-toggle="tooltip" title="مشاهدة" data-original-title="Edit">
                                  <i class="fa fa-eye"></i>
                                </a>

                              @can('حذف مشرف')
                                <!-- Delete-->
                                <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled btn-left"
                                        title="حذف" data-original-title="delete" data-toggle="modal"
                                        data-target="#modal-mods-delete{{$user->id}}">
                                  <i class="fa fa-times"></i>
                                </button>

                                <!-- Delete Modal -->
                                    @include('admin.mods.inc.del-modal')
                                @endcan
                              </div>

                            </td>
                          </tr>

                        @empty

                         <tr>
                           <td colspan="5" class="bg-light text-center">لا يوجد مشرفين حتى الآن</td>
                         </tr>

                        @endforelse

                        </tbody>
                    </table>

                </div>
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


