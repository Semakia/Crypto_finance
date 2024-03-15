@extends('layouts.app')
@section('title')
<title>Contactez-nous</title>
@endsection
@section('content')

<div class="Contact-page">
    <div class="container">

        <div class="mb-5">
            <p class="text-center">Chez <strong>CryptoFinance</strong>, nous accordons une grande importance à la satisfaction de nos clients. Si vous avez des commentaires, des questions ou des préoccupations, veuillez nous les faire parvenir en utilisant le formulaire ci-dessous. Nous sommes là pour vous aider !</p>
        </div>

        <div class="footer-widget text-center mb-5">
            <h3 class="widget-title mb--35 mb-sm--20">Joignez nous sur nos réseaux sociaux</h3>
            <div class="footer-widget">
                <ul class="footer-menu">
                    <a href="#" target="_blank"><i class="fa-brands fa-facebook fa-3x"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-x-twitter fa-3x"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-instagram fa-3x"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-whatsapp fa-3x"></i></a>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Contactez-nous</h2>

                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <div class="mt-5 mb-5">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
