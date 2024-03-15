@extends('admin.layouts.app')
@section('title')
    {{__('messages.news.edit_news')}}
@endsection
@php $styleCss = 'style'; @endphp

@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="col-12">
                    @include('admin.layouts.errors')
                </div>
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ route('levels.index') }}">{{ __('messages.common.back') }}</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::hidden('is_edit', true,['id' => 'newsIsEdit']) }}
                        {{ Form::model($level, ['route' => ['news.update', $level->id], 'method' => 'patch', 'files'=>true, 'id'=>'editNewsForm']) }}
                            @include('admin.levels.fields')
                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
