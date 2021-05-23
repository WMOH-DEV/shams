@extends('admin.main-layout')

@section('title')قائمة التجار@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="fa fa-users"></i>
        </x-slot>
        <x-slot name="title">
            قائمة التجار
        </x-slot>
    </x-top-nav>
@endsection

@section('content') <livewire:merchant /> @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>jQuery(function(){Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']);});</script>
@endsection


