@extends('user.layouts.app')
@section('title')
    Home
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-card">
                    
                    <div class="card rounded-pill" style="background-color: #cdb008; margin-bottom: 20px">
                        <div class="card-title m-3 d-flex justify-center align-items-center ">
                            <div class="text-center" style="font-style: italic">
                                <h3>Vous avez été invité par...</h3>
                            </div>
                        </div>
                    </div>

                    <div class="shadow-md p-xxl-10 px-5 py-8 d-flex align-items-center justify-content-between my-sm-3 my-2"
                        style="background: linear-gradient(to left, #cdb008, #ffed89); border-radius: 20px;">
                        <div class="me-2 d-flex flex-column justify-content-center">
                            <h1 style="font-size: 30px">Bienvenue,</h1>
                            <h1 style="font-size: 50px">{{ getLogInUser()->full_name }}</h1>
                        </div>
                    </div>

                    <div class="bg-white shadow-md rounded-10 p-xxl-10 px-5 py-4 d-flex mt-10 flex-column my-sm-3 my-2"
                                style="border-radius: 20px; margin-top: 20px !important">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-1-xxl fw-light text-black">Wallet</h2>
                            </div>
                            <div class="col text-end">
                                <div class="text-en">
                                    <h3 class="mb-0 fs-1-xxl fw-bolder text-black">{{ auth()->user()->balanceFloat + number_format($data['totalDonations'],2) }} €</h3>
                                </div>
                            </div>
                        </div>
                        <hr class="line" style="background-color: #cdb008; width: 100%; margin-top: 10px; height: 4px;">

                        <div class="row">
                            <div class="col-6">
                                <div class="shadow-md rounded-10 p-xxl-10 px-5 py-4 d-flex flex-column my-sm-3 my-2 custom-border"
                                    style="border-radius: 20px">
                                    <h3 class="title text-gray-600">Retirable</h3>
                                    <h3 class="price mb-0 fs-1-xxl text-end" style="font-size: 50px; color:#ba9f07">
                                        <span style="font-size: smaller; color:#ba9f07">€</span> {{ number_format($data['totalDonations'],2)  }}
                                    </h3>
                                    <h4 class="price-text text-end" style="color:#ba9f07">Invested</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="shadow-md rounded-10 p-xxl-10 px-5 py-4 d-flex flex-column my-sm-3 my-2 custom-border"
                                    style="border-radius: 20px">
                                    <h3 class="title text-gray-600">Don solidaire</h3>
                                    <h3 class="price mb-0 fs-1-xxl text-end" style="font-size: 50px; color:#e4c514">
                                        <span style="font-size: smaller; color:#e4c514">€</span> {{ auth()->user()->balanceFloat }}
                                    </h3>
                                    <h4 class="price-text text-end" style="color:#e4c514">Invested</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="right-card">
                    <div class="bg-white shadow-md rounded-10 p-xxl-10 px-2 py-4 d-flex flex-column my-sm-3 my-2"
                        style="border-radius: 20px; height: 100%">
                        <h3 class="mb-4" style="margin-left: 30px">Membres</h3>

                        <div class="row">
                            @foreach ($users as $user)
                                <div class="col-6 d-flex flex-column align-items-center">
                                    <div class="circle" style="background-color: #cdb008;">
                                        <i class="fa-solid fa-user users"
                                            style="color: white; font-size: 50px; margin-top: 25px; margin-left: 27px"></i>
                                    </div>
                                    <h3 class="mb-4">{{ $user->first_name }}</h3>
                                </div>
                            @endforeach

                            <div class="col-6 d-flex flex-column align-items-center">
                                <div class="circle" style="background-color: #cdb008;">
                                    <i class="fa-solid fa-plus users"
                                        style="color: white; font-size: 50px; margin-top: 25px; margin-left: 27px"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 widget" style="width: 100%; height: 100%; margin-top: 6%">
                        <div class="shadow-md rounded-10 p-xxl-10 px-5 py-4 d-flex flex-column my-sm-3 my-2 custom-border"
                            style="background-color: #cdb008; border-radius: 20px">
                            <h3 class="text-white">Solde disponible</h3>
                            <h3 class="mb-0 fs-1-xxl text-end" style="font-size: 70px; color: white">
                                <span style="font-size: smaller; color: white">€</span> {{ number_format($data['totalDonations']) }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>



            <style>
                .custom-border {
                    border: 1px solid rgb(178, 178, 178);
                }

                .circle {
                    width: 100px;
                    height: 100px;
                    border-radius: 50%;
                    display: inline-block;
                    margin: 5px;
                }


                @media (max-width:768px) {
                    .circle {
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    }
                    .users {
                        width: 20px !important;
                        margin: 0 30% !important;
                    }

                   .title {
                        font-size: 14px;
                   }

                   .price {
                    width: 100%;
                    font-size: 14px !important; 
                   }

                   .price-text {
                    font-size: 14px !important;
                   }
                   
                }
            </style>

        </div>
    </div>
@endsection
