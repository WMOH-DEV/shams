@extends('admin.main-layout')

@section('title')
    مشاهدة رأي {{ $opinion->user->name }}
@endsection


@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="nav-main-link-icon fas fa-comment"></i>
        </x-slot>
        <x-slot name="title">
            عرض رأي مستخدم
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
                    <a href="{{route('opinions.index')}}"> آراء المستخدمين</a>
                    <i class="fas fa-angle-left px-2"></i>
                    <span> مشاهدة رأي {{ $opinion->user->name }}</span>
                </h5>
                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="pinned_toggle">
                        <i class="si si-pin"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="state_toggle" data-action-mode="demo">
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
                            <a href="{{ route('opinions.index') }}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
                                <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
                                رجوع
                            </a>
                        </div>
                    </div>

                    <!-- infos -->
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-hover table-vcenter no-footer">
                                <tbody>
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" class="w-25">
                                            <label for="name">
                                                اسم المستخدم
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            {{$opinion->user->name}}
                                            </td>
                                    </tr>
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row">
                                            <label for="desc-maxlength150">رأي المستخدم</label>
                                        </th>
                                        <td class="font-w600">
                                            {{$opinion->desc}}
                                        </td>
                                    </tr>
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row">
                                            <label for="status">
                                                حالة الرأي
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            @if ($opinion->active == 1)
                                                <span class="badge badge-pill badge-primary">مفعل <i class="fa fa-fw fa-check"></i> </span>
                                            @else
                                                <span class="badge badge-pill badge-danger">غير مفعل <i class="fa fa-fw fa-times-circle"></i> </span>
                                            @endif
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
