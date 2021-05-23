@extends('admin.main-layout')

@section('title')قائمة الأعضاء@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="fa fa-users"></i>
        </x-slot>
        <x-slot name="title">
            قائمة الأعضاء
        </x-slot>
    </x-top-nav>
@endsection

@section('content') <livewire:client /> @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>jQuery(function(){Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']);});</script>
@endsection


