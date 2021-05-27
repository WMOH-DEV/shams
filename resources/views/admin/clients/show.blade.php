@extends('admin.main-layout')

@section('title')مشاهدة العضو@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="fa fa-user"></i>
        </x-slot>
        <x-slot name="title">
            مشاهدة الملف الشخصي
        </x-slot>
    </x-top-nav>
@endsection

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h5 class="h6 mb-1">
                    <a href="{{route('admincp.index')}}">{{ __('global.main') }}</a><i
                        class="fas fa-angle-left px-2"></i><a href="{{route('clients.index')}}">قائمة الأعضاء</a><i
                        class="fas fa-angle-left px-2"></i><span>  مشاهدة الملف الشخصي {{$client->name}}</span>
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

                <div class="row">
                    <div class="col-sm-12  d-flex ">
                        <a href="{{route('clients.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
                            <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
                            رجوع
                        </a>
                        <a type="submit" href="{{route('clients.edit' , $client->id)}}"
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
                                    {{$client->name}}
                                </td>
                            </tr>

                            <tr style="font-size: 0.9rem">
                                <th scope="row" style="width: 20%">
                                    <label for="email">
                                        البريد الإلكتروني
                                    </label>
                                </th>
                                <td class="font-w600">
                                    {{$client->email}}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 20%">
                                    <label for="roles">
                                        الجوال
                                    </label>
                                </th>
                                <td class="font-w600">
                                   <span class="number_ltr"> {{$client->phone}}</span>
                                </td>
                            </tr>

                            <tr>
                                <th scope="row" style="width: 20%">
                                    <label for="city">
                                        المدينة
                                    </label>
                                </th>
                                <td class="font-w600">
                                    {{$client->city->name}}
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




