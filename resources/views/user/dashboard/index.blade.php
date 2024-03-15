@extends('user.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@php $styleCss = 'style'; @endphp
@section('content')

<style>
    @media (max-width: 768px) and (max-width: 992px) {
        .retrait-div{

            margin: 8%;
        }
    }


</style>

<div class="container-fluid">
    <div style="display: flex; justify-content: space-between;">
        <div style="text-align: left;">
            <h1 style="font-size: 30px; margin: 0;">Mon wallet</h1>
        </div>
        <div style="text-align: end" class =" d-lg-block d-none">
            <h1 style="font-size: 30px; margin: 0;">Mes </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6" style="width: 100%">

            <div class="row">

                <div class="col-12 mb-6">

                    <div class="col-xxl-6 col-xl-7 col-sm-6 widget">
                        <div class="shadow-md rounded-10 p-xxl-10 px-5 py-14 d-flex flex-column my-sm-3 my-2" style="background: linear-gradient(to left, #cdb008, #ffed89); border-radius: 20px;">
                            <h2 class="text-white" style="margin-top: -5%">Solde total</h2>
                            <h1 class="mb-0 fs-1-xxl text-end" style="font-size: 100px; color: white;">
                                <span style="font-size: smaller; color:white;">€</span>  {{ auth()->user()->balanceFloat + number_format($data['totalDonations'],2) }}
                            </h1>
                        </div>
                    </div>


                    <div class="col-xxl-6 col-xl-7 col-sm-6 widget" style="margin-top: 50px">

                            <div class="row">
                                <div class="col">
                                    <div class="shadow-md rounded-10 p-xxl-10 px-5 py-7 d-flex flex-column my-sm-3 my-2" style="border-radius: 20px; background-color:#ba9f07">
                                        <h3 class="title text-white">Somme totale investie</h3>
                                        <h3 class="mb-0 fs-1-xxl text-end" style="font-size: 50px; color: white">
                                            <span style="font-size: smaller; color:white">€</span> {{ number_format($data['amountInvested'],2) }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="shadow-md rounded-10 p-xxl-10 px-5 py-7 d-flex flex-column my-sm-3 my-2" style="border-radius: 20px; background-color:#e4c514">
                                        <h3 class="title text-white">Don solidaire</h3>
                                        <h3 class="mb-0 fs-1-xxl text-end" style="font-size: 50px; color:white">
                                            <span style="font-size: smaller; color: white">€</span> {{ auth()->user()->balanceFloat }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6  d-lg-block d-xl-block d-none " style="margin-left: -60%">
            <div class="col" style="">
                <div class="shadow-md rounded-10 p-xxl-10 px-2 py-6 my-sm-3 my-2 custom-border" style="border-radius: 20px; margin-left: 55%; position: relative; width: 65%;">
                    <i class="fa-solid fa-ellipsis" style="margin-left: 90%; margin-top: -5%; font-size: 25px"></i>
                    <div class="text-center" style="margin-top: -5%">
                        <img alt="Card" src="/images/Card.png" class="img-fluid" width="250px">
                        <div class="d-flex justify-content-center">
                            <div class="circle" style="background-color: #78745e;"></div>
                            <div class="circle" style="background-color: #cdb008;"></div>
                            <div class="circle" style="background-color: #e9d66d;"></div>
                        </div>
                        <h1 style="font-size: 20px; color: #cdb008; margin-top: 5%">6510 6563 4751 XXXX</h1>
                        <h1 class="font-size: 15px; margin-top: 8%">Historique des transactions</h1>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        {{--<div class="col-md-6">
                            <div class="d-flex flex-column justify-content-center">
                                <h3>Date</h3>
                                <h4 class="text-gray-600">Description</h4>
                            </div>
                        </div>
                        <div class="col-md-6 text-end"  >
                            <h4 style="color: #cdb008; margin-top: 5%">
                                -<span style="font-size: smaller; color:#e4c514">€</span> 600
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column justify-content-center">
                                <h3>Date</h3>
                                <h4 class="text-gray-600">Description</h4>
                            </div>
                        </div>
                        <div class="col-md-6 text-end"  >
                            <h4 style="color: #cdb008; margin-top: 5%">
                                -<span style="font-size: smaller; color:#e4c514">€</span> 600
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column justify-content-center">
                                <h3>Date</h3>
                                <h4 class="text-gray-600">Description</h4>
                            </div>
                        </div>
                        <div class="col-md-6 text-end"  >
                            <h4 style="color: #cdb008; margin-top: 5%">
                                -<span style="font-size: smaller; color:#e4c514">€</span> 600
                            </h4>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-12 d-lg-none d-xl-none d-block retrait-div justify-content-center" style =" align-items: center; ">
            <div style="text-align: start" >
                <h1 style="font-size: 30px; margin: 0;">Mes retraits</h1>
            </div>
            <div class="row mx-auto" style="">
                <div class="shadow-md rounded-10 p-xxl-10 px-2 py-6 my-sm-3 my-2 custom-border" style="border-radius: 20px;  position: relative; width: 85%;">
                    <i class="fa-solid fa-ellipsis" style="margin-left: 90%; margin-top: -5%; font-size: 25px"></i>
                    <div class="text-center" style="margin-top: -5%">
                        <img alt="Card" src="/images/Card.png" class="img-fluid" width="250px">
                        <div class="d-flex justify-content-center">
                            <div class="circle" style="background-color: #78745e;"></div>
                            <div class="circle" style="background-color: #cdb008;"></div>
                            <div class="circle" style="background-color: #e9d66d;"></div>
                        </div>
                        <h1 style="font-size: 20px; color: #cdb008; margin-top: 5%">6510 6563 4751 XXXX</h1>
                        <h1 class="font-size: 15px; margin-top: 8%">Historique des transactions</h1>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-6">
                            <div class="d-flex flex-column justify-content-center">
                                <h3>Date</h3>
                                <h4 class="text-gray-600">Description</h4>
                            </div>
                        </div>
                        <div class="col-md-6 text-end"  >
                            <h4 style="color: #cdb008; margin-top: 5%">
                                -<span style="font-size: smaller; color:#e4c514">€</span> 600
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column justify-content-center">
                                <h3>Date</h3>
                                <h4 class="text-gray-600">Description</h4>
                            </div>
                        </div>
                        <div class="col-md-6 text-end"  >
                            <h4 style="color: #cdb008; margin-top: 5%">
                                -<span style="font-size: smaller; color:#e4c514">€</span> 600
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column justify-content-center">
                                <h3>Date</h3>
                                <h4 class="text-gray-600">Description</h4>
                            </div>
                        </div>
                        <div class="col-md-6 text-end"  >
                            <h4 style="color: #cdb008; margin-top: 5%">
                                -<span style="font-size: smaller; color:#e4c514">€</span> 600
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .custom-border {
                border: 1px solid rgb(178, 178, 178); /* Style de la bordure grise */
            }
            .circle {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                display: inline-block;
                margin: 5px;
            }

            @media (max-width : 768px) {
                .title {
                    font-size: 14px ;
                }
            }

        </style>

    </div>
    <div class="row chart-container">

        <div class="col-xl-12 pt-5">
            <div class="card" style="flex-direction: column!important;">
                <div class="card-title m-5 d-flex justify-content-between align-items-center">
                    <h3>{{ __('messages.dashboards.monthly_donation_withdraw_report') }}</h3>
                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary me-5" title="Switch Chart">
                                        <span class="svg-icon svg-icon-1 m-0 text-center"
                                              id="userChangeDonationWithdrawChart">
                                            <i class="fas fa-chart-bar fs-1 fw-boldest chart"></i>
                                        </span>
                    </a>
                </div>
                <div id="userDonationWithdrawChartContainer">
                    <div id="userDonationWithdrawChart" {{ $styleCss }}="height: 350px" class="
                    card-rounded-bottom"></div>
            </div>
        </div>
    </div>
</div>


@include('user.dashboard.templates.templates')
@endsection
