<div class="content">
    <x-message/>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">  {{ __('global.list') }} {{ __('global.orders') }} </h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="pinned_toggle">
                    <i class="si si-pin"></i>
                </button>
                <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="state_toggle"
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
        <div class="block-content">
            <div wire:offline class="w-100 text-center mb-2 font-w700">
                <span class="badge badge-pill badge-danger"><i class="fa fa-fw fa-times-circle"></i> تأكد من اتصالك بالانترنت</span>

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-2">
                @if (count($checked) > 0)
                    <!-- Delete all -->
                        <button type="button"
                                wire:click.prevent="deleteSelected"
                                onclick="confirm('هل أنت متأكد من هذا الإجراء ؟') || event.stopImmediatePropagation()"
                                class="btn btn-outline-danger mr-1 mb-3 btn-sm">
                            <i class="fa fa-fw fa-times mr-1"></i> حذف @if (count($checked) > 0) ({{count($checked)}}
                            ) @endif
                        </button>
                    @endif
                </div>

                <div class="col-sm-12 col-md-10 row justify-between justify-content-end align-items-center pl-0">
                    <div class="col-sm-12 col-md-5 px-3 row justify-between align-items-center">
                        <label style="width: 100%">
                            <input type="search" class="form-control"
                                   placeholder="البحث برقم الطلب..."
                                   autofocus
                                   style="font-family: unset"
                                   wire:model.debounce.500ms="search">
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-4 px-3 row justify-between align-items-center">
                        <div class="col-3"> بواسطة:</div>
                        <div class="col-9 pl-0">
                            <label style="width: 100%">
                                <select name="DataTables_Table_2_length"
                                        aria-controls="DataTables_Table_2"
                                        class="form-control rtl-select-arrow pr-2 ar-font"
                                        wire:model="selectedUser">
                                    <option value="{{null}}">غير محدد</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 px-3 row justify-between align-items-center">
                        <div class="col-4"> العرض:</div>
                        <div class="col-8">
                            <label style="width: 100%">
                                <select name="DataTables_Table_2_length"
                                        aria-controls="DataTables_Table_2"
                                        class="form-control rtl-select-arrow pr-2"
                                        wire:model="pagination">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

            @if ($selectPage)
                @if ($selectAll)
                    <p class="font-size-sm m-1">تم تحديد جميع الادخالات وعددها <span
                            class="font-w700">{{$orders->total()}}</span>
                        ،
                        <button wire:click="cancelSelectAll" wire:offline.attr="disabled" class="text-primary">إلغاء
                            التحديد؟
                        </button>
                    </p>
                @else
                    <p class="font-size-sm m-1">لقد قمت بتحديد <span class="font-w700">{{count($checked)}}</span>
                        @if (count($checked) < $orders->total())
                            هل تريد تحديد كل الادخالات <span class="font-w700">{{$orders->total()}}</span> ؟
                            <button wire:click="selectAll" wire:offline.attr="disabled"
                                    class="badge badge-pill py-1 badge-success pointer">تحديد الكل <i
                                    class="fa fa-fw fa-check"></i></button></p>
                    @else
                        <button wire:click="cancelSelectAll" wire:offline.attr="disabled" class="text-primary">إلغاء
                            التحديد؟
                        </button>
                    @endif
                @endif
            @endif
            <div class="table-responsive">
                <table class="table table-bordered
                 table-striped table table-hover table-vcenter">
                    <thead style="font-size: 0.7rem">
                    <tr>
                        <th class="text-center" style="width: 5%">
                            <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                <input type="checkbox"
                                       class="custom-control-input"
                                       id="check-all"
                                       wire:model="selectPage"
                                       name="check-all">
                                <label class="custom-control-label" for="check-all"></label>
                            </div>

                        </th>

                        <th class="text-center">رقم الـ ID</th>
                        <th class="text-center">عنوان الطلب</th>
                        <th class="text-center">صاحب الطلب</th>
                        <th class="text-center">نوع الطلب</th>
                        <th class="text-center">التوصيل</th>
                        <th class="text-center">تاريخ الطلب</th>
                        <th class="text-center" style="width: 100px;">الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse ($orders as $order)
                        <tr style="font-size: 0.8rem">
                            <td class="text-center">
                                <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           value="{{$order->id}}"
                                           id="{{$order->id}}"
                                           name="{{$order->id}}"
                                           wire:model="checked">
                                    <label class="custom-control-label" for="{{$order->id}}"></label>
                                </div>
                            </td>
                            <td class="text-center">{{ $order->id }}</td>
                            <td class="text-center">{{ $order->name }}</td>
                            <td class="text-center">{{ $order->user->name }}</td>
                            <td class="text-center">
                                @if ($order->state_piece == "من الوكالة")
                                    <span class="badge badge-pill badge-primary p-1">من الوكالة</span>
                                @elseif ($order->state_piece == "جديد")
                                    <span class="badge badge-pill badge-info p-1">جديد</span>
                                @elseif ($order->state_piece == "مستعملة")
                                    <span class="badge badge-pill badge-warning p-1">مستعملة</span>
                                @elseif ($order->state_piece == "بديل من شركات اخرى")
                                    <span class="badge badge-pill badge-secondary p-1">بديل</span>
                                @elseif ($order->state_piece == "كليهما")
                                    <span class="badge badge-pill badge-danger p-1">كليهما</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($order->delivery == "مستعجل")
                                    <span class="badge badge-pill badge-primary p-1">مستعجل <i class="si si-plane"></i></span>
                                @elseif ($order->delivery == "عادى")
                                    <span class="badge badge-pill badge-secondary p-1">عادى <i class="si si-speedometer"></i></span>
                                @endif
                            </td>
                            <td class="text-center">{{ $order->created_at->format('Y-m-d') }}</td>
                            <!-- Actions -->
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('orders.edit', $order->id)}}" type="button"
                                       class="btn btn-sm btn-primary js-tooltip-enabled btn-right"
                                       data-toggle="tooltip" title="العروض المقدمة" data-original-title="prices">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="{{route('orders.show', $order->id)}}" type="button"
                                       class="btn btn-sm btn-primary js-tooltip-enabled btn-mid"
                                       data-toggle="tooltip" title="" data-original-title="show">
                                        <i class="fa fa-eye"></i>
                                    </a>


                                    <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled btn-left"
                                            title="حذف" data-original-title="delete" data-toggle="modal"
                                            data-target="#modal-delete{{$order->id}}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    @include('admin.orders.inc.del-modal')
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td class="text-center" colspan="10">لا يوجد نتائج في الجدول</td>
                    @endforelse

                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}

        </div>

    </div>

</div>

@section('css')
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/select2/css/select2.min.css">
@endsection

@section('js')

    <script src="{{asset('admin/assets')}}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>
    <script>
        $(".js-select2").select2({
            dir: "rtl",
            width: "100%",
        });
    </script>
@endsection

