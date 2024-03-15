<!doctype html>
<html class="no-js" lang="zxx">

<head>
    {{-- <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/icon.png"> --}}

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
        <section class="page-title-area bg-image ptb--80" data-bg-image="images/register.png">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">Créer un nouveau compte</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb area End -->

        <div class="centered-content">
            <div class="page-content-inner pt--75 pb--80 d-flex justify-content-center align-items-center">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-10 mb-sm--50">
                            <div class="login-box">
                                <form class="form form--login" style="margin-top: 150px" method="POST" action="{{ route('register') }}" >
                                    <div class="form__group mb--20">
                                        <label class="form__label" for="account_type">Type de compte<span class="required">*</span></label>
                                        <select class="form__input" id="account_type" name="account_type">
                                            <option value="private">Compte privé</option>
                                            <option value="public">Compte public</option>
                                        </select>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6">
                                            <div class="form__group mb--20">
                                                <label class="form__label" for="name">Nom<span class="required">*</span></label>
                                                <input type="text" class="form__input" id="name" name="name">
                                            </div>
                                            <div class="form__group mb--20">
                                                <label class="form__label" for="prenoms">Prénoms<span class="required">*</span></label>
                                                <input type="text" class="form__input" id="prenoms" name="prenoms">
                                            </div>
                                            <div class="form__group mb--20">
                                                <label class="form__label" for="email">Email<span class="required">*</span></label>
                                                <input type="email" class="form__input" id="email" name="email">
                                            </div>
                                            <div class="form__group mb--20">
                                                <label class="form__label" for="register_password">Mot de passe<span class="required">*</span></label>
                                                <input type="password" class="form__input" id="register_password" name="register_password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form__group mb--20">
                                                <label class="form__label" for="username">Pseudo<span class="required">*</span></label>
                                                <input type="text" class="form__input" id="username" name="username">
                                            </div>
                                            <div class="form__group mb--20">
                                                <label class="form__label" for="country">Pays<span class="required">*</span></label>
                                                <select class="form__input" id="country" name="country">
                                                    <option value="">Choisissez votre pays</option>
                                                    <option value="France">France</option>
                                                    <option value="Belgique">Belgique</option>
                                                    <option value="Canada">Canada</option>
                                                </select>
                                            </div>
                                            <div class="form__group mb--20">
                                                <label class="form__label" for="phone_number">Numéro de téléphone<span class="required">*</span></label>
                                                <input type="tel" class="form__input" id="phone_number" name="phone_number" title="Seuls les chiffres sont autorisés">
                                            </div>
                                            <div class="form__group mb--20">
                                                <label class="form__label" for="confirm_password">Confirmer le mot de passe<span class="required">*</span></label>
                                                <input type="password" class="form__input" id="confirm_password" name="confirm_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form__group mb--20 text-center">
                                            <div class="form__group mr--30" type="submit">
                                                <a href="" class="btn btn-outline btn-size-sm btn-color-primary btn-shape-round btn-hover-2">Créer un compte</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form__group text-center">
                                            <a href="{{url('/connexion')}}">Vous avez déjà un compte ? Connectez-vous</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <script>
        // JavaScript code to allow only numeric input
        document.getElementById('phone_number').addEventListener('input', function(event) {
        // Get the value of the input
        let inputValue = event.target.value;

        // Remove any non-numeric characters
        inputValue = inputValue.replace(/\D/g, '');

        // Update the input value
        event.target.value = inputValue;
});

    </script>
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