@extends('admin.main-layout')

@section('title')مشاهدة عروض@endsection

@section('css')

    <link rel="stylesheet" href="{{asset('assets')}}/js/plugins/select2/css/select2.min.css">

@endsection

@section('navbar')
    <x-top-nav>
        <x-slot name="icon">
            <i class="fas fa-clipboard-list"></i>
        </x-slot>
        <x-slot name="title">
            مشاهدة عروض طلب
        </x-slot>
    </x-top-nav>
@endsection

@section('content') @livewire('quotation', ['order' => $order]) @endsection


