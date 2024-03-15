<style>
    /* Style par défaut des liens */
    .aside-menu-container .nav-link {
        color: white !important; /* Couleur du texte par défaut */
        transition: color 0.3s ease !important; /* Transition douce de la couleur */
    }

    /* Style des liens au survol */
    .aside-menu-container .nav-link:hover {
        background-color: rgb(81, 81, 81) !important; /* Couleur du texte au survol */
        text-decoration: none !important; /* Supprimer la décoration au survol si nécessaire */
    }

    /* Style des liens actifs */
    .aside-menu-container .nav-item.active .nav-link {
        background-color: black !important; /* Fond noir pour le lien actif */
        /* Autres styles que vous souhaitez appliquer */
    }

</style>

<li class="nav-item {{ Request::is('user/home*') ? 'active' : '' }}">
    <a class="nav-link  py-3" aria-current="page" href="{{ route('user.home') }}" style ="display : flex ; flex-direction: column ; gap : 10px" >
        <span class="aside-menu-icon pe-3 align-items-center"> <i class="fas fa-house fs-3" style ="height: 30px; padding-left :132px; color: white" ></i></span>
        <span class="aside-menu-title" style="padding-left :127px; color: white">{{ __('messages.common.dashboard') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('user/dashboard*') ? 'active' : '' }}">
    <a class="nav-link  py-3" aria-current="page" href="{{ route('user.dashboard') }}" style ="display : flex ; flex-direction: column ; gap : 10px" >
        <span class="aside-menu-icon pe-3 align-items-center"> <i class="fa-solid fa-table-columns fs-3" style ="height: 30px; padding-left :132px; color: white" ></i></span>
        <span class="aside-menu-title" style="padding-left :105px; color: white">{{ __('messages.common.wallet') }}</span>
    </a>
</li>
<li class="nav-item {{ Request::is('user/campaigns*') ? 'active' : '' }}">
    <a class="nav-link  py-3" aria-current="page" href="{{ route('user.campaigns.index') }}" style ="display : flex ; flex-direction: column ; gap : 10px" >
        <span class="aside-menu-icon pe-3 align-items-center"> <i class='fas fa-bullhorn fs-3' style ="height: 30px; padding-left :124px; color: white "></i></span>
        <span class="aside-menu-title" style="padding-left :110px; color: white">{{ __('messages.campaign.projects') }}</span>
    </a>
</li>
<li class="nav-item {{ Request::is('user/members*') ? 'active' : '' }}">
    <a class="nav-link  py-3" aria-current="page" href="{{ route('user.members') }}" style ="display : flex ; flex-direction: column ; gap : 10px" >
        <span class="aside-menu-icon pe-3 align-items-center"> <i class="fa-solid fa-users fs-3" style ="height: 30px; padding-left :125px; color: white" ></i></span>
        <span class="aside-menu-title" style="padding-left :110px; color: white">{{ __('messages.common.flowers') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('user/calendar*') ? 'active' : '' }}">
    <a class="nav-link  py-3" aria-current="page" href="{{ route('user.calendar') }}" style ="display : flex ; flex-direction: column ; gap : 10px" >
        <span class="aside-menu-icon pe-3 align-items-center"> <i class="fas fa-calendar-days fs-3" style ="height: 30px; padding-left :130px; color: white" ></i></span>
        <span class="aside-menu-title" style="padding-left :110px; color: white">{{ __('messages.common.calendar') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('user/profile*') ? 'active' : '' }}">
    <a class="nav-link  py-3" aria-current="page" href="{{ route('user.profile.setting') }}" style ="display : flex ; flex-direction: column ; gap : 10px" >
        <span class="aside-menu-icon pe-3 align-items-center"> <i class="fa-regular fa-user fs-3" style ="height: 30px; padding-left :128px; color: white" ></i></span>
        <span class="aside-menu-title" style="padding-left :120px; color: white">{{ __('messages.common.profile') }}</span>
    </a>
</li>

<li class="nav-item {{ Request::is('user/security*') ? 'active' : '' }}">
    <a class="nav-link  py-3" aria-current="page" href="{{ route('user.security') }}" style ="display : flex ; flex-direction: column ; gap : 10px" >
        <span class="aside-menu-icon pe-3 align-items-center"> <i class="fa-solid fa-shield fs-3" style ="height: 30px; padding-left :124px; color: white " ></i></span>
        <span class="aside-menu-title" style="padding-left :110px; color: white">{{ __('messages.common.security') }}</span>
    </a>
</li>


    {{-- <li class="nav-item {{ Request::is('user/members*') ? 'active' : '' }}">
        <a class="nav-link d-flex align-items-center py-3" aria-current="page" href="{{ route('user.members.index') }}">
            <span class="aside-menu-icon pe-3"> <i class='fas fa-bullhorn fs-3'></i></span>
            <span class="aside-menu-title">{{ __('messages.common.members') }}</span>
        </a>
    </li>--}}
    <li class="nav-item {{ Request::is('user/withdraw*') ? 'active' : '' }}">
        <a class="nav-link py-3" aria-current="page" href="{{ route('user.withdraw.index') }}" style ="display : flex ; flex-direction: column ; gap : 10px">
            <span class="aside-menu-icon pe-3 align-items-center"> <i class='fa fa-money-bill fs-3' style ="height: 30px; padding-left :124px; color: white " ></i></span>
            <span class="aside-menu-title" style="padding-left :110px; color: white">{{ __('messages.withdraw.withdraw_request') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('user/payout-settings*') ? 'active' : '' }}">
        <a class="nav-link py-3" aria-current="page" href="{{ route('user.settings.index') }}" style ="display : flex ; flex-direction: column ; gap : 10px">
            <span class="aside-menu-icon pe-3 align-items-center"> <i class="fas fa-calendar fs-3" style ="height: 30px; padding-left :124px; color: white "></i></span>
            <span class="aside-menu-title" style="padding-left :110px; color: white">{{ __('messages.payout_setting.payout_settings') }}</span>
        </a>
    </li>
