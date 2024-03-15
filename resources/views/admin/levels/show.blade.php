@extends('admin/layouts.app')
@section('title')
    {{ __('messages.levels.levels_details') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{url()->previous()}}">{{ __('messages.common.back') }}</a>
                </div>

                <div class="col-12">
                    @include('admin.layouts.errors')
                </div>
                <div >
                    <div class="d-flex flex-column">
                        @include('admin.levels.show_fields')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
