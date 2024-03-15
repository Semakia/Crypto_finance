@extends('layouts.app')
@section('title')
<title>Investir</title>
@endsection
@section('content')

<div class="col-8 mx-auto">
    <div class="text-center" style="margin-left: 10px; margin-top: 60px">
        <h2 class="mt-4" style="margin-top: 20px;"><strong>CryptoFinance</strong> est une plateforme agréée qui propose d'investir dans de nombreux packages sous forme d'obligations en y tirant des gains journaliers. Veuillez consulter la page invest pour plus d'informations.</h2>
        <div class="mt-4">
            <p><strong>Choisissez Votre Package d'Investissement</strong></p>
            <p>Nous offrons plusieurs options de packages d'investissement pour répondre à vos besoins financiers. Vous pouvez choisir parmi les packages suivants :</p>

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="ft-product">
                                <div class="product-inner">
                                    <div class="product-image">
                                        <figure class="product-image--holder">
                                            <img src="images/50euros.png" alt="Product" style="width: 200px; height: auto;">
                                        </figure>
                                        <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                    </div>
                                    <div class="product-info plr--20">
                                        <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 50 euros.</a></h3>
                                        <div class="product-info-bottom justify-content-center">
                                            <a href="{{ url('/invest') }}" class="add-to-cart">
                                                <i class="la la-plus"></i>
                                                <span>Investir</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="ft-product">
                                <div class="product-inner">
                                    <div class="product-image">
                                        <figure class="product-image--holder">
                                            <img src="images/1000euros.png" alt="Product" style="width: 200px; height: auto;">
                                        </figure>
                                        <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                    </div>
                                    <div class="product-info plr--20">
                                        <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 100 euros.</a></h3>
                                        <div class="product-info-bottom justify-content-center">
                                            <a href="{{ url('/invest') }}" class="add-to-cart">
                                                <i class="la la-plus"></i>
                                                <span>Investir</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="ft-product">
                                <div class="product-inner">
                                    <div class="product-image">
                                        <figure class="product-image--holder">
                                            <img src="images/100euros.png" alt="Product" style="width: 200px; height: auto;">
                                        </figure>
                                        <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                    </div>
                                    <div class="product-info plr--20">
                                        <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 50 euros.</a></h3>
                                        <div class="product-info-bottom justify-content-center">
                                            <a href="{{ url('/invest') }}" class="add-to-cart">
                                                <i class="la la-plus"></i>
                                                <span>Investir</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="ft-product">
                                <div class="product-inner">
                                    <div class="product-image">
                                        <figure class="product-image--holder">
                                            <img src="images/10000euros.png" alt="Product" style="width: 200px; height: auto;">
                                        </figure>
                                        <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                    </div>
                                    <div class="product-info plr--20">
                                        <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 100 euros.</a></h3>
                                        <div class="product-info-bottom justify-content-center">
                                            <a href="{{ url('/invest') }}" class="add-to-cart">
                                                <i class="la la-plus"></i>
                                                <span>Investir</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="ft-product">
                                <div class="product-inner">
                                    <div class="product-image">
                                        <figure class="product-image--holder">
                                            <img src="images/500euros.png" alt="Product" style="width: 200px; height: auto;">
                                        </figure>
                                        <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                    </div>
                                    <div class="product-info plr--20">
                                        <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 50 euros.</a></h3>
                                        <div class="product-info-bottom justify-content-center">
                                            <a href="{{ url('/invest') }}" class="add-to-cart">
                                                <i class="la la-plus"></i>
                                                <span>Investir</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="ft-product">
                                <div class="product-inner">
                                    <div class="product-image">
                                        <figure class="product-image--holder">
                                            <img src="images/20000euros.png" alt="Product" style="width: 200px; height: auto;">
                                        </figure>
                                        <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                    </div>
                                    <div class="product-info plr--20">
                                        <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 100 euros.</a></h3>
                                        <div class="product-info-bottom justify-content-center">
                                            <a href="{{ url('/invest') }}" class="add-to-cart">
                                                <i class="la la-plus"></i>
                                                <span>Investir</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ajoutez les autres colonnes ici -->
            </div>
        </div>
    </div>
</div>
@endsection
