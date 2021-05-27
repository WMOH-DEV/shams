@extends('admin.main-layout')

@section('title')
    قائمة الطلبات
@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="nav-main-link-icon fas fa-calendar-week"></i>
        </x-slot>
        <x-slot name="title">
            قائمة الطلبات
        </x-slot>
    </x-top-nav>
@endsection


@section('content') @livewire('order-wire') @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>jQuery(function(){Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']);});</script>
@endsection


