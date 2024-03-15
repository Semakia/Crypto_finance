@extends('user.layouts.app')
@section('title')
    Members
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <div class="container-fluid">

        <div class="d-flex flex-column justify-center">


            <div style="display: flex; justify-content: space-between; margin-bottom: -40px">
                <div style="text-align: left;">
                    <h1 style="font-size: 26px; margin: 0;">Membres</h1>
                </div>
            </div>

            <div class="content d-flex flex-column flex-column-fluid pt-7" style="margin-bottom: -44%">
                <div class='d-flex flex-wrap flex-column-fluid'>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="row">
                                    @foreach ($levels as $level)
                                        <div class="col-xxl-4 col-xl-4 col-sm-4" style="margin-bottom: 17%">
                                            <div class="petal-container">
                                                <div class="d-flex flex-column justify-center">
                                                    <h1 class="titre"
                                                        style="margin-bottom: 25px; margin-left: -10px; color: {{ $level['to'] }}">
                                                        <strong>{{ $level['name'] }}</strong></h1>


                                                    <div class="flower">
                                                        @if($level['id'] != 1 && !$level['can_upgrade'])
                                                        <div style="position: relative; display: inline-block;">
                                                            <i class="fa fa-lock" style="font-size: 48px; color: {{ $level['to'] }};position: relative; bottom: -8.8rem;left: 19px;"></i>
                                                            <a href="{{ route('user.members.upgrade',['id' => $level['id']]) }}" style="font-size: 17px; color: #000; text-decoration: none; position: absolute; font-weight: bold ;bottom: -9rem; transform: translate(-50%, -50%); z-index: 1;">Upgrade</a>
                                                        </div>
                                                        @else
                                                        <div class="small-circle"
                                                            style="border: 3px solid {{ $level['to'] }}; border-radius: 50%; width: 30px; height: 30px;">
                                                        </div>
                                                        @endif
                                                        {{--@if($level['id'] != 1 && !$level['can_upgrade'])
                                                        <i class="fa fa-lock" style="font-size:48px;color:{{ $level['to'] }};position: relative;bottom: -8.5rem;left: 25px;z-index: 9999;"></i>
                                                        @endif
                                                        @if($level['id'] != 1 && !$level['can_upgrade'])
                                                            <a href="#">Upgrade</a>
                                                        @endif--}}
                                                        <div class="petal">
                                                            <div class="circle" style="background: {{ $level['to'] }};">
                                                                <p class="text-center text-white"
                                                                    style="margin-top: 20px; margin-right : 8px; transform: rotate(288deg); font-size: 13px">
                                                                    <strong>{{ isset($level['members'][1]) ? $level['members'][1]['first_name'] : '' }}</strong>
                                                                </p>
                                                            </div>
                                                            <div class="triangle"
                                                                style="border-top : 45px solid {{ $level['to'] }};"></div>
                                                        </div>
                                                        <div class="petal">
                                                            <div class="circle" style="background: {{ $level['to'] }};">
                                                                <p class="text-center text-white"
                                                                    style="margin-top: 20px; transform: rotate(216deg); font-size: 13px">
                                                                    <strong>{{ isset($level['members'][2]) ? $level['members'][2]['first_name'] : '' }}</strong>
                                                                </p>
                                                            </div>
                                                            <div class="triangle"
                                                                style="border-top : 45px solid {{ $level['to'] }};"></div>
                                                        </div>
                                                        <div class="petal">
                                                            <div class="circle" style="background: {{ $level['to'] }};">
                                                                <p class="text-center text-white"
                                                                    style="margin-top: 20px; transform: rotate(142deg); font-size: 13px">
                                                                    <strong>{{ isset($level['members'][3]) ? $level['members'][3]['first_name'] : '' }}</strong>
                                                                </p>
                                                            </div>
                                                            <div class="triangle"
                                                                style="border-top : 45px solid {{ $level['to'] }};"></div>
                                                        </div>
                                                        <div class="petal">
                                                            <div class="circle" style="background: {{ $level['to'] }};">
                                                                <p class="text-center text-white"
                                                                    style="margin-top: 15px; margin-right : 4px; transform: rotate(72deg); font-size: 13px">
                                                                    <strong>{{ isset($level['members'][4]) ? $level['members'][4]['first_name'] : '' }}</strong>
                                                                </p>
                                                            </div>
                                                            <div class="triangle"
                                                                style="border-top : 45px solid {{ $level['to'] }};"></div>
                                                        </div>

                                                        <div class="petal">
                                                            <div class="circle" style="background:{{ $level['to'] }}">
                                                                <p class="text-center text-white"
                                                                    style="margin-top: 20px; font-size: 13px">
                                                                    <strong>{{ isset($level['members'][0]) ? $level['members'][0]['first_name'] : '' }}</strong>
                                                                </p>
                                                            </div>
                                                            <div class="triangle"
                                                                style="border-top : 45px solid {{ $level['to'] }};"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach


                                    {{-- <div class="col-xxl-4 col-xl-4 col-sm-4" style="margin-bottom: 17%">
                                    <div class="petal-container">
                                        <div class="d-flex flex-column justify-center">
                                            <h1 class="text-center" style="margin-bottom: 25px; margin-left: 22px ;color: #f47c01"><strong>LYS</strong></h1>
                                        <div class="flower">
                                            <div class="small-circle" style="border: 3px solid #f47c01; border-radius: 50%; width: 30px; height: 30px;"></div>
                                            <div class="petal">
                                                <div class="circle" style="background: #f47c01;">
                                                    <p class="text-center text-white" style="margin-top: 20px; margin-right : 8px; transform: rotate(288deg); font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #f47c01;"></div>
                                            </div>
                                            <div class="petal">
                                                <div class="circle" style="background: #f47c01;">
                                                    <p class="text-center text-white" style="margin-top: 20px; transform: rotate(216deg); font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #f47c01;"></div>
                                            </div>
                                            <div class="petal">
                                                <div class="circle" style="background: #f47c01;">
                                                    <p class="text-center text-white" style="margin-top: 20px; transform: rotate(142deg); font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #f47c01;"></div>
                                            </div>
                                            <div class="petal">
                                                <div class="circle" style="background: #f47c01;">
                                                    <p class="text-center text-white" style="margin-top: 15px; margin-right : 4px; transform: rotate(72deg); font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #f47c01;"></div>
                                            </div>
                                            {{-- <div class="petal">
                                                <div class="circle">
                                                    <p class="text-center" style="margin-top: 20px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle"></div>
                                            </div>
                                            <div class="petal">
                                                <div class="circle" style="background: #f47c01;">
                                                    <p class="text-center text-white" style="margin-top: 20px; font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #f47c01;"></div>
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xxl-4 col-xl-4 col-sm-4" style="margin-bottom: 17%">
                                    <div class="petal-container">
                                        <div class="d-flex flex-column justify-center">
                                            <h1 class="text-center" style="margin-bottom: 25px; margin-left: -22px ;color: #4e61eb"><strong>CLEMATITE</strong></h1>
                                        <div class="flower">
                                            <div class="small-circle" style="border: 3px solid #4e61eb; border-radius: 50%; width: 30px; height: 30px;"></div>
                                            <div class="petal">
                                                <div class="circle" style="background: #4e61eb;">
                                                    <p class="text-center text-white" style="margin-top: 20px; margin-right : 8px; transform: rotate(288deg); font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #4e61eb;"></div>
                                            </div>
                                            <div class="petal">
                                                <div class="circle" style="background: #4e61eb;">
                                                    <p class="text-center text-white" style="margin-top: 20px; transform: rotate(216deg); font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #4e61eb;"></div>
                                            </div>
                                            <div class="petal">
                                                <div class="circle" style="background: #4e61eb;">
                                                    <p class="text-center text-white" style="margin-top: 20px; transform: rotate(142deg); font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #4e61eb;"></div>
                                            </div>
                                            <div class="petal">
                                                <div class="circle" style="background: #4e61eb;">
                                                    <p class="text-center text-white" style="margin-top: 15px; margin-right : 4px; transform: rotate(72deg); font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #4e61eb;"></div>
                                            </div>
                                           <div class="petal">
                                                <div class="circle">
                                                    <p class="text-center" style="margin-top: 20px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle"></div>
                                            </div>
                                            <div class="petal">
                                                <div class="circle" style="background: #4e61eb;">
                                                    <p class="text-center text-white" style="margin-top: 20px; font-size: 13px"><strong>John</strong></p>
                                                </div>
                                                <div class="triangle" style="border-top : 45px solid #4e61eb;"></div>
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="shadow-md rounded-10 p-xxl-10 px-2 py-6 my-sm-3 my-2 custom-border" style="margin-left: -30px; border-radius: 20px; position: relative; width: 94%;">
            <div class="container">
                <p class="titre">Historique des entrées</p>
                <p class="annee">2024</p>

                <div class="text-center">
                    <div class="mois">
                        <div class="trait"></div>
                        <div>Janv</div>
                    </div>
                    <div class="mois">
                        <div class="trait"></div>
                        <div>Feb</div>
                    </div>
                    <div class="mois">
                        <div class="trait"></div>
                        <div>Mar</div>
                    </div>
                    <div class="mois">
                        <div class="trait"></div>
                        <div>Apr</div>
                    </div>
                    <div class="mois">
                        <div class="trait"></div>
                        <div>May</div>
                    </div>
                    <div class="mois">
                        <div class="trait"></div>
                        <div>Jun</div>
                    </div>
                    <div class="mois">
                        <div class="trait"></div>
                        <div>Jul</div>
                    </div>
                    <div class="mois">
                        <div class="trait"></div>
                        <div>Aug</div>
                    </div>

                    <div class="text-end">
                        <i class="fa-solid fa-arrow-right" style="font-size: 30px; color: #f47c01; display: inline-block; margin-top: -36px"></i>
                    </div>
                </div>

            </div>
        </div> --}}

        </div>


    </div>
@endsection
