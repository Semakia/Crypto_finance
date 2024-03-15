@extends('admin.layouts.app')
@section('title')
    {{__('messages.levels.levels')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:level-table/>
        </div>
    </div>
@endsection
