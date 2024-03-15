@extends('layouts.app')
@section('title')
<title>Acceuil</title>
@endsection
@section('content')

        <!-- Main Content Wrapper Start -->
        <main class="main-content-wrapper">
            <!-- Slider area Start -->
            <section class="homepage-slider mb--75 mb-md--55">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="element-carousel slick-right-bottom"
                            data-slick-options='{
                                "slidesToShow": 1,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-arrow-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-arrow-right" }
                            }'
                            data-slick-responsive='[{"breakpoint": 768, "settings": {"arrows": false}}]'>

                                <div class="item">
                                    <div class="single-slide d-flex align-items-center bg-color" data-bg-color="#dbf3f2">
                                        <div class="row align-items-center g-0 w-100">
                                            <div class="col-xl-6 col-md-6 mb-sm--50 order-md-2">
                                                <figure data-animation="fadeInUp" data-duration=".3s" data-delay=".3s" class="pl-15 pr--60">
                                                    <img src="images/investissement_2.jpg" alt="Slider O1 image" class="mx-auto">
                                                </figure>
                                            </div>
                                            <div class="col-md-5 col-lg-5 offset-md-1 order-md-1">
                                                <div class="slider-content">
                                                    <div class="slider-content__text border-color-2 mb--40 mb-md--30">
                                                        <h1 class="heading__primary lh-pt3" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">L'investissement dès 50 euros</h1>
                                                        {{-- <p class="mb--15" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">#New Treand</p> --}}
                                                        <p class="mb--20" data-animation="fadeInUp" data-duration=".3s" data-delay=".3s">Investissez dans de différents packages de vos choix à partir de 50 euros selon vos objectifs de gains.</p>
                                                    </div>
                                                    <div class="slider-content__btn">
                                                        <a href="{{ url('/invest') }}" class="btn btn-outline-primary" data-animation="fadeInUp" data-duration=".3s" data-delay=".6s">Investissez dès maintenant</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Slider area End -->

            <!-- Top Sale Area Start -->
            <section class="top-sale-area mb--75 mb-md--55">
                <div class="container">
                    <div class="row mb--35 mb-md--23">
                        <div class="col-12 text-center">
                            <h2>Quelques packages d'investissement</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="element-carousel"
                            data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 3
                            }'
                            data-slick-responsive='[
                                {"breakpoint": 768, "settings": {"slidesToShow": 2}},
                                {"breakpoint": 480, "settings": {"slidesToShow": 1}}
                            ]'>
                                <div class="item">
                                    <div class="ft-product">
                                        <div class="product-inner">
                                            <div class="product-image">
                                                <figure class="product-image--holder">
                                                    <img src="images/50euros.png" alt="Product">
                                                </figure>
                                                <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                            </div>
                                            <div class="product-info plr--20">
                                                <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 50 euros.</a></h3>
                                                <div class="product-info-bottom">
                                                    <div class="product-price-wrapper">
                                                        <span class="money">50 euros</span>
                                                    </div>
                                                    <a href="{{ url('/invest') }}" class="add-to-cart">
                                                        <i class="la la-plus"></i>
                                                        <span>Investir</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="ft-product">
                                        <div class="product-inner">
                                            <div class="product-image">
                                                <figure class="product-image--holder">
                                                    <img src="images/100euros.png" alt="Product">
                                                </figure>
                                                <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                            </div>
                                            <div class="product-info plr--20">
                                                <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 100 euros.</a></h3>
                                                <div class="product-info-bottom">
                                                    <div class="product-price-wrapper">
                                                        <span class="money">100 euros</span>
                                                    </div>
                                                    <a href="{{ url('/invest') }}" class="add-to-cart">
                                                        <i class="la la-plus"></i>
                                                        <span>Investir</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="ft-product">
                                        <div class="product-inner">
                                            <div class="product-image">
                                                <figure class="product-image--holder">
                                                    <img src="images/500euros.png" alt="Product">
                                                </figure>
                                                <a href="{{ url('/invest') }}" class="product-overlay"></a>
                                            </div>
                                            <div class="product-info plr--20">
                                                <h3 class="product-title"><a href="{{ url('/invest') }}">Package de 500 euros.</a></h3>
                                                <div class="product-info-bottom">
                                                    <div class="product-price-wrapper">
                                                        <span class="money">500 euros</span>
                                                    </div>
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
                    </div>
                    <div class="row mb--35 mb-md--23">
                        <div class="col-12 text-center" style="margin-top: 90px">
                            <h2>CryptoFinance est une plateforme agréée qui propose d'investir dans de nombreux packages sous forme d'obligations en y tirant des gains journaliez. Veuillez consulter la page invest pour plus d'informations.</h2>
                        </div>
                        <div class="col-12 text-center" style="margin-top: 50px">
                            <a href="{{ url('/invest') }}" class="btn btn-outline-primary" data-animation="fadeInUp" data-duration=".3s" data-delay=".6s">Investir</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Top Sale Area End -->

            <!-- Feature Product Area Start -->
            <section class="feature-product-area mb--75 mb-md--55">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="feature-product bg-color" data-bg-color="#d7fbf9">
                                <div class="feature-product__inner bg-color" data-bg-color="#e9fefd">
                                    <div class="feature-product__info">
                                        {{-- <p class="hastag">#New Style</p> --}}
                                        <h2 class="" style="font-size: 40px"><a href="product-details.html">Pourquoi choisir CryptoFinance ?</a></h2>
                                        <a href="{{ url('/à-propos') }}" class="feature-product__btn">Savoir plus</a>
                                    </div>
                                    <figure class="feature-product__image mb-sm--30">
                                        <a href="{{url('/à-propos')}}">
                                            <img src="images/question.png" alt="Feature Product">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Best Sale Product Area Start -->
            <section class="best-sale-product-area mb--75 mb-md--55">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="best-sale-product bg-color" data-bg-color="#f7f8f9">
                                <div class="best-sale-product__inner bg-color" data-bg-color="#ffffff">
                                    <figure class="best-sale-product__img">
                                        <a href="product-details.html">
                                            <img src="images/img_1.png" alt="Best Sale Product">
                                        </a>
                                    </figure>
                                    <div class="best-sale-product__info">
                                        <h2 class="best-sale-product__heading">
                                            <span class="best-sale-product__heading--main">Gains avec</span>
                                            <span class="best-sale-product__heading--sub">CryptoFinance</span>
                                        </h2>
                                        <p class="best-sale-product__desc">Connectez-vous et profitez des différentes opportunitées</p>
                                        <a href="shop.html" class="btn btn-outline btn-size-md btn-color-primary btn-shape-round btn-hover-2">Connexion</a>
                                    </div>
                                </div>
                                <figure class="best-sale-product__top-image">
                                    <img src="images/img_2.png" alt="bg image">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Best Sale Product Area End -->

            <!-- Blog Area Start -->
            <section class="blog-area mb--70 mb-md--50">
                <div class="container">
                    <div class="row mb--35 mb-md--23">
                        <div class="col-12 text-center">
                            <h2>Nouveautés !</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="element-carousel" data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 3,
                                "slidesToScroll": 1
                            }'
                            data-slick-responsive='[
                                {"breakpoint": 992, "settings": {"slidesToShow": 2}},
                                {"breakpoint": 768, "settings": {"slidesToShow": 1}}
                            ]'>
                                <div class="item">
                                    <article class="blog">
                                        <div class="blog__inner">
                                            <div class="blog__media">
                                                <figure class="image">
                                                    <img src="images/news.png" alt="Blog" class="w-100">
                                                    <a href="{{ url('/à-propos') }}" class="item-overlay"></a>
                                                </figure>
                                            </div>
                                            <div class="blog__info text-center">
                                            </div>
                                            <div class="text-center">
                                                <h2 class="blog__title"><a href="{{ url('/à-propos') }}">En savoir plus.</a></h2>
                                            </div>
                                        </div>
                                    </article>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Blog Area End -->
        </main>
        <!-- Main Content Wrapper End -->
@endsection

