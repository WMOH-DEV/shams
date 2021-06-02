@extends('admin.main-layout')

@section('title') الصفحات @endsection


@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="nav-main-link-icon fas fa-flag"></i>
        </x-slot>
        <x-slot name="title">
            الصفحات
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
                    <span>صفحات الموقع</span>
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
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="{{route('pages.create')}}" type="button"
                           class="btn btn-outline-success mr-1 mb-3 btn-sm">
                            <i class="fa fa-fw fa-plus mr-1"></i>
                            {{ __('global.add') }}
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex">
                    </div>
                </div>

                <div class="row">
                    @foreach($pages as $page)
                        <div class="col-xl-4">
                            <div class="block block-rounded">
                                <div class="block-header block-header-default">
                                    <a href="{{route('pages.edit', $page->id)}}">
                                        <h3 class="block-title">{{$page->name}}</h3>
                                    </a>
                                    <div class="block-options">
                                        <a href="{{route('pages.edit', $page->id)}}" type="button"
                                           class="btn-block-option">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <!-- Delete-->
                                        <button type="button" class="btn-block-option"
                                            title="حذف" data-original-title="delete" data-toggle="modal"
                                                data-target="#modal-delete{{$page->id}}">
                                        <i class="si si-close"></i>
                                        </button>
                                        <!-- Delete Modal -->
                                        @include('admin.pages.inc.del-modal')
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle">
                                            <i class="si si-arrow-up"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="py-1">
                                        <img class="mx-auto" src="{{asset("uploads/$page->image")}}" alt="{{$page->name}}"
                                             style="height: 155px">
                                        <div>
                                            <p class="p-2 bg-primary text-white rounded">
                                                {{strlen(utf8_decode(Strip_tags($page->desc))) >= 80 ? mb_substr(Strip_tags($page->desc), 0, 70,'utf-8').'...': Strip_tags($page->desc)}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Lines Chart -->
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection

