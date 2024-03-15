<style>
    /* Ajoutez ces styles dans votre feuille de style ou dans une balise <style> dans votre fichier HTML */
    .aside-menu-container {
        background-color: #cdb008;
        margin-left: -80px;
    }

    /* Changer la couleur du texte en blanc */
    .aside-menu-container a.dropdown-item{
        color: white !important; /* Changer la couleur du texte en blanc */
    }

    /* Changer la couleur du logo en blanc */
    .aside-menu-container .sidebar-logo  {
        color: white !important; /* Changer la couleur du texte en blanc */
    }
    .navlink:hover {
    background-color: black;
    /* Autres styles que vous souhaitez appliquer au survol */
}

</style>

<div class="aside-menu-container" id="sidebar">
    {{-- <div class="aside-menu-container__aside-logo flex-column-auto">
        <a data-turbo="false" href="{{ route('landing.home') }}"
           class="text-decoration-none sidebar-logo d-flex align-items-center"
           title="{{ (strlen(getAppName()) > 12 ) ? substr(getAppName(), 0,12).'...' : getAppName() }}">
            <div class="image image-mini me-3">
                <img src="{{ getLogoUrl() }}"
                     class="img-fluid object-fit-cover" alt="profile image" width="40px" height="30px">
            </div>
            <span class="text-gray-900 fs-4">{{ (strlen(getAppName()) > 12 ) ? substr(getAppName(), 0,12).'...' : getAppName() }}</span>
        </a>
        <button type="button"
                class="btn px-0 text-gray-600 aside-menu-container__aside-menubar d-lg-block d-none sidebar-btn">
            <i class="fa-solid fa-bars fs-1"></i>
        </button>
    </div> --}}
    <div class="sidebar-scrolling">
        <ul class="aside-menu-container__aside-menu nav flex-column">
            @include('user.layouts.menu')
            <div class="no-record text-center d-none">No matching records found</div>
        </ul>
    </div>
    <div class="mt-12"></div>
    <a class="navlink dropdown-item d-flex cursor-pointer" style="padding-left: 80px;">
        <span class="dropdown-icon me-4 " style="margin-left: 40px">
            <i class="fa-solid fa-right-from-bracket"></i>
        </span>
        <form id="logout-form" action="{{url('/logout')}}" method="post">
            @csrf
        </form>
        <span onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit()">
            Sign Out</span>
    </a>
</div>
<div class="bg-overlay" id="sidebar-overly"></div>
