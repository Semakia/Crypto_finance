@extends('user.layouts.app')
@section('title')
{{ __('messages.common.calendar') }}
@endsection
@php $styleCss = 'style'; @endphp
@section('content')

<div class="container-fluid">
            <h1 style ="font-size : 30px;">{{ __('messages.common.calendar') }}</h1>

            <div class ="calendar-section">
                <div class="calendar">
                    <div class="calender-header">
                        <h1 style="font-size : 35px ; font-weight : bold">2023</h1>
                        <h1><img src="../images/calendrier.png" width="50px"></h1>
                    </div>
                    <div>
                        <custom-calendar date ="2023-12-09"></custom-calendar>
                    </div>

                </div>

                <div class="calendar-messages">
                    @foreach ($events as $event)
                    <div class="calender-message-1">
                        <h1 style="font-weight: bold;">{{ $event->event_date }}</h1>
                        <p><a href="{{ route('landing.event.detail',$event->slug) }}">{{ $event->title }}</a></p>
                    </div>
                    @endforeach



                </div>
            </div>
</div>
@endsection
