<div class="content">
    <x-message/>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h5 class="h6 mb-1">
                <a href="{{route('admincp.index')}}">{{ __('global.main') }}</a>
                <i class="fas fa-angle-left px-2"></i>
                <a href="{{route('orders.index')}}">الطلبات</a>
                <i class="fas fa-angle-left px-2"></i>
                <a href="{{route('orders.show', $order->id)}}">طلب رقم {{$order->id}}</a>
                <i class="fas fa-angle-left px-2"></i>
                <span>العروض المقدمة</span>
            </h5>
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
                    @superAdmin
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
                    @endsuperAdmin
                </div>

                <div class="col-sm-12 col-md-10 row justify-between justify-content-end align-items-center pl-0">
                    <div class="col-sm-12 col-md-5 px-3 row justify-between align-items-center">
                        <label style="width: 100%">
                            <input type="search" class="form-control"
                                   placeholder="البحث برقم العرض، إسم التاجر، المدينة..."
                                   autofocus
                                   style="font-family: unset"
                                   wire:model.debounce.500ms="search">
                        </label>
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
            @superAdmin
            @if ($selectPage)
                @if ($selectAll)
                    <p class="font-size-sm m-1">تم تحديد جميع الادخالات وعددها <span
                            class="font-w700">{{$quotations->total()}}</span>
                        ،
                        <button wire:click="cancelSelectAll" wire:offline.attr="disabled" class="text-primary">إلغاء
                            التحديد؟
                        </button>
                    </p>
                @else
                    <p class="font-size-sm m-1">لقد قمت بتحديد <span class="font-w700">{{count($checked)}}</span>
                        @if (count($checked) < $quotations->total())
                            هل تريد تحديد كل الادخالات <span class="font-w700">{{$quotations->total()}}</span> ؟
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
            @endsuperAdmin
            <div class="table-responsive">
                <table class="table table-bordered
                 table-striped table table-hover table-vcenter">
                    <thead style="font-size: 0.7rem">
                    <tr>
                        @superAdmin
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
                        @endsuperAdmin
                        <th class="text-center">رقم الـ ID</th>
                        <th class="text-center">إسم التاجر</th>
                        <th class="text-center">المدينة</th>
                        <th class="text-center">عرض السعر</th>
                        <th class="text-center">نوع المنتج</th>
                        <th class="text-center">السعر الإجمالي</th>
                        <th class="text-center">تاريخ التقديم</th>
                        <th class="text-center" style="width: 100px;">الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse ($quotations as $quotation)
                        <tr style="font-size: 0.8rem">
                            @superAdmin
                            <td class="text-center">
                                <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           value="{{$quotation->id}}"
                                           id="{{$quotation->id}}"
                                           name="{{$quotation->id}}"
                                           wire:model="checked">
                                    <label class="custom-control-label" for="{{$quotation->id}}"></label>
                                </div>
                            </td>
                            @endsuperAdmin
                            <td class="text-center">{{ $quotation->id }}</td>
                            <td class="text-center">{{ $quotation->merchant->name }}</td>
                            <td class="text-center">{{ $quotation->city->name }}</td>
                            <td class="text-center">
                                @if ($quotation->price == "جزئى")
                                    <span class="badge badge-pill badge-primary p-1">جزئى</span>
                                @elseif ($quotation->price == "كلى")
                                    <span class="badge badge-pill badge-secondary p-1">كلى</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($quotation->kind_product == "وكالة")
                                    <span class="badge badge-pill badge-primary p-1">وكالة </span>
                                @elseif ($quotation->kind_product == "بديل من شركات اخرى")
                                    <span class="badge badge-pill badge-secondary p-1">بديل</span>
                                @elseif ($quotation->kind_product == "كليهما")
                                    <span class="badge badge-pill badge-danger p-1">كليهما</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $quotation->total_price }}</td>
                            <td class="text-center">{{ $quotation->created_at->format('Y-m-d') }}</td>
                            <!-- Actions -->
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('quotations.show.one', $quotation->id)}}" type="button"
                                       class="btn btn-sm btn-primary js-tooltip-enabled btn-right"
                                       data-toggle="tooltip" title="" data-original-title="show">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled btn-left"
                                            title="حذف"
                                            @Mod
                                            disabled
                                            @endMod
                                            @superAdmin
                                            data-original-title="delete" data-toggle="modal"
                                            data-target="#modal-delete{{$quotation->id}}"
                                            @endsuperAdmin
                                    >
                                        <i class="fa fa-times"></i>
                                    </button>
                                    @superAdmin
                                    @include('admin.quotations.inc.del-modal')
                                    @endsuperAdmin
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td class="text-center" colspan="10">لا يوجد نتائج في الجدول</td>
                    @endforelse

                    </tbody>
                </table>
            </div>
            {{ $quotations->links() }}

        </div>

    </div>


</div>
