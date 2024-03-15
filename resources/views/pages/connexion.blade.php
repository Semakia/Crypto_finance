<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <!-- ************************* CSS Files ************************* -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!-- style css -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <!-- Main Wrapper Start -->
    <div class="wrapper">

        <!-- Breadcrumb area Start -->
        <section class="page-title-area bg-image ptb--80" data-bg-image="images/login.png">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Connexion</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->

        <div class="centered-content">
            <div class="page-content-inner pt--75 pb--80 d-flex justify-content-center align-items-center">
                <div class="container-fluid"> <!-- Utilisation de container-fluid pour s'étendre sur toute la largeur -->
                    <div class="row justify-content-center"> <!-- Utilisation de justify-content-center pour centrer les colonnes -->
                        <div class="col-md-10 mb-sm--50"> <!-- Augmentation de la taille de la colonne à col-md-8 -->
                            <div class="login-box">
                                <form class="form form--login" method="POST" action="{{ route('login') }}">
                                    <div class="row">
                                        <div class="form__group mb--20">
                                            <label class="form__label" for="username_email">Nom d'utilisateur ou email<span class="required">*</span></label>
                                            <input type="text" class="form__input" id="username_email" name="username_email">
                                        </div>
                                        <div class="form__group mb--20">
                                            <label class="form__label" for="login_password">Mot de passe <span class="required">*</span></label>
                                            <input type="password" class="form__input" id="login_password" name="login_password">
                                        </div>
                                        <div class="form__group mb--10">
                                            <label class="form__label checkbox-label" for="store_session">
                                                <input type="checkbox" name="store_session" id="store_session">
                                                <span>Se souvenir de moi</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form__group mb--20 text-center"> <!-- Ajout de la classe text-center pour centrer les éléments -->
                                            <div class="form__group mr--30">
                                                <a href="" class="btn btn-outline btn-size-sm btn-color-primary btn-shape-round btn-hover-2">Connexion</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form__group text-center"> <!-- Ajout de la classe text-center pour centrer les éléments -->
                                            <a class="forgot-pass" href="#">Mot de passe oublié ?</a><br>
                                            <a href="{{url('/register')}}">Pas de compte ? Créer un nouveau compte</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<!-- Main Content Wrapper End -->


        <!-- Global Overlay Start -->
        <div class="global-overlay"></div>
        <!-- Global Overlay End -->

        <!-- Global Overlay Start -->
        <a class="scroll-to-top" href=""><i class="la la-angle-double-up"></i></a>
        <!-- Global Overlay End -->
    </div>
    <!-- Main Wrapper End -->


    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

<style>
    .centered-content {
    position: absolute;
    top: 190%;
    left: 50%;
    transform: translate(-50%, -50%);
}


</style>

</html>
