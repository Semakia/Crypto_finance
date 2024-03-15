@extends('user.layouts.app')
@section('title')
    {{ __('messages.user.profile_details') }}
@endsection
@php $styleCss = 'style'; @endphp
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        @include('user.layouts.errors')

        <h1 style="font-size: 25px;">Mon profil</h1>
        <p>Gérer les paramètres de votre profil</p>
        <div class="profile-info">
            <div class="card">
                <form method="POST" action="{{ route('update.profile.setting') }}" novalidate="novalidate"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <span style="font-weight: bold; margin-bottom: 10px; font-size: 20px">Votre photo de profil</span>
                        <div class="mb-5 avatar-section d-flex align-items-center">
                            <div class="image-picker me-3">
                                <div class="image previewImage" id="exampleInputImage"
                                     style="background-image: url('{{isset($user->profile_image) ? $user->profile_image : asset('front_landing/images/team-1.png')}}')">
                                </div>
                                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                      data-placement="top" data-bs-original-title="Change Profile">
                                    <label>
                                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        <input type="file" name="image" class="image-upload d-none" accept="image/*"/>
                                        {{ Form::hidden('avatar_remove') }}
                                    </label>
                                </span>
                            </div>
                            <div class="button-section">
                                <a href="" class="btn btn-secondary avatar-button">Changer de photo</a>
                                <a href="" class="btn  avatar-button-2">Supprimer</a>
                            </div>
                        </div>
                        <div class="infos-section mb-5 col-lg-12">
                            <label class="col-lg-12 form-label required">Nom et prénoms</label>
                            <div class="col-lg-12 mb-5">
                                <div class="row " style ="gap:20px">
                                    <div class="col-lg-12">
                                        {{ Form::text('first_name', $user->first_name, ['class'=> 'form-control', 'placeholder' => __('messages.user.first_name'), 'required']) }}
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        {{ Form::text('last_name', $user->last_name, ['class'=> 'form-control', 'placeholder' => __('messages.user.last_name'), 'required']) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="infos-section mb-5 col-lg-12">
                            <label class="col-lg-12 form-label required">Adresse email</label>
                            <div class="col-lg-12">
                                {{ Form::email('email', $user->email, ['class'=> 'form-control', 'placeholder' => __('messages.common.email'), 'required']) }}
                            </div>
                        </div>
                        <div class="infos-section mb-5 col-lg-12">
                            <label class="col-lg-12 form-label required">Numéro de téléphone</label>
                            <div class="col-lg-12">
                                {{ Form::tel('contact', $user->contact, ['class'=> 'form-control', 'placeholder' => __('messages.profile.phone_number'), 'required']) }}
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex py-6 px-9">
                        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                        <a href="{{route('user.dashboard')}}" type="reset"
                           class="btn btn-secondary" style="backgound-color:#d9c138 ">{{__('messages.common.discard')}}
                        </a>
                    </div>
                </form>

                <div><img src="{{ asset('images/abeille-avatar.png') }}" class="img-fluid d-none d-lg-block" width="500px"></div>
            </div>

        </div>
    </div>
@endsection
