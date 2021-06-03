@extends('admin.main-layout')

@section('title')الآراء@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="nav-main-link-icon fas fa-comment"></i>
        </x-slot>
        <x-slot name="title">
            آراء المستخدمين
        </x-slot>
    </x-top-nav>
@endsection


@section('content') <livewire:comment-wire /> @endsection

@section('js')
    <!-- Page JS Helpers (Table Tools helpers) -->
    <script>jQuery(function(){Dashmix.helpers(['table-tools-checkable', 'table-tools-sections']);});</script>
@endsection


