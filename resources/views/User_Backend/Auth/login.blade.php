@extends('Layout.main')

@section('extraCSS')
@endsection

@section('title')
    Hoster-Finder.de - {{ __('Einloggen') }}
@endsection

@section('content')
    <div class="col-1">
    </div>
    <div class="col-xl-10 col-12 d-flex justify-content-center p-0">
        <!-- Main Content -->
        <div class="register_box bg_tertiar p-0 mt-5">
            <!-- Register Form ect -->
            <div class="">
                <div class="row flex-wrap m-0">
                    <div class="col-xl-5 d-none d-xl-flex p-0">
                        <div class="container-fluid m-0 p-0 d-flex bg_image_register align-items-end" style="background: url( {{ asset('/res/images/icons/loginbg.jpg') }} ); background-size: auto 80rem;">
                            <b class="h1 mb-4 ms-5 text_light">
                                Einloggen
                            </b>
                        </div>
                    </div>
                    <div class="col-xl-7 d-flex justify-content-center">
                        <form onsubmit="deactivate_submit();" action="{{ route('user.login', ['locale' => \request()->route()->locale]) }}" method="post" id="l_form">
                            @csrf
                            @if ($errors->any())
                               <div class="row justify-content-center align-items-center pt-3">
                                       @foreach ($errors->all() as $error)
                                           <div class="alert alert_custom text_black m-1 col-xl-7">
                                               <div><b style="color: #DB3656;"> {{ $error }}</b><br><br></div>
                                           </div>
                                       @endforeach
                               </div>
                            @endif
                            <div class="row flex-wrap justify-content-center">
                                <div class="col-12 d-flex flex-wrap row justify-content-center pt-4 m-0">
                                    <div id="register_form_email_border" class="register_input_box d-flex align-items-center mt-5 col-xl-7 col-10">
                                        <div class="register_input_icon_box justify-content-center align-items-center d-flex me-1">
                                            <i id="register_form_email_icon" class="material-icons register_input_icon ms-2">mail</i>
                                        </div>
                                        <input name="email" oninput="register_avaible_email();" id="register_form_email" value="" placeholder="Email Adresse" class="register_input">
                                    </div>
                                    <div id="register_form_password_border" class="register_input_box d-flex align-items-center mt-4 col-xl-7 col-10">
                                        <div class="register_input_icon_box justify-content-center align-items-center d-flex me-1">
                                            <i id="register_form_password_icon" class="material-icons register_input_icon ms-2">vpn_key</i>
                                        </div>
                                        <input name="password" oninput="register_avaible_password();" id="register_form_password" value="" type="password" placeholder="Passwort" class="register_input">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start mt-4 p-0 ms-1 col-xl-7 col-10">
                                        <div class="pretty p-default p-round p-pulse p-bigger">
                                            <input name="remember" type="checkbox" checked />
                                            <div class="state p-success-o">
                                                <label class="text_light"></label>
                                            </div>
                                        </div>
                                        <p class="text_light mt-3 cursor_pointer">
                                            Eingeloggt bleiben.
                                        </p>
                                        <div class="text_light d-flex justify-content-end col pb-1 m-0 align-items-start">
                                            <a class="text_lila_hoover text_lila p-0 m-0" href="">
                                                Passwort vergessen?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mt-5 p-0 pt-4 col-xl-7 col-10">
                                        <button id="submit_button" type="submit" class="account_create_button w-100">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-1 d-none d-xl-flex align-items-center justify-content-center">
                                                    <i class="material-icons text_light" id="submit_icon">login</i>
                                                </div>
                                                <div class="col-xl-11 col-12 d-flex align-items-center justify-content-center text_light">
                                                    <h5>
                                                        {{ __('Einloggen') }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mt-5 p-0 pt-2 col-xl-7 col-10">
                                        <div class="container-fluid">
                                            <div class="row w-100 flex-wrap">
                                                <div class="col-xl-5 d-flex col-12 justify-content-center align-items-center">
                                                    <div class="distanz_linie">
                                                    </div>
                                                </div>
                                                <div class="col-xl-2 d-xl-flex d-none justify-content-center align-items-start">
                                                    <b class="text_light mt-0 pt-0">
                                                        ODER
                                                    </b>
                                                </div>
                                                <div class="col-xl-5 d-xl-flex d-none justify-content-center align-items-center">
                                                    <div class="distanz_linie">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mt-5 p-0 pt-2 col-xl-7 col-10">
                                        <div class="d-flex flex-column flex-xl-row flex-wrap justify-content-between w-100">
                                            <a class="mb-xl-0 mb-3 text-decoration-none login_provider_box d-flex justify-content-center align-items-center" href="{{ route('user.socialite.redirect', ['locale'=>request()->route()->locale, 'method'=>1]) }}">
                                                <img class="login_provider_icon" src="{{ asset('/res/images/icons/google.png') }}" alt="Goo">
                                            </a>
                                            <a class="mb-xl-0 mb-3 text-decoration-none login_provider_box d-flex justify-content-center align-items-center" href="{{ route('user.socialite.redirect', ['locale'=>request()->route()->locale, 'method'=>2]) }}">
                                                <img class="login_provider_icon" src="{{ asset('/res/images/icons/github.png') }}" alt="Git">
                                            </a>
                                            <a class="mb-xl-0 mb-3 text-decoration-none login_provider_box d-flex justify-content-center align-items-center" href="{{ route('user.socialite.redirect', ['locale'=>request()->route()->locale, 'method'=>2]) }}">
                                                <img class="login_provider_icon" src="{{ asset('/res/images/icons/apple-logo.png') }}" alt="Apl">
                                            </a>
                                            <a class="mb-xl-0 mb-3 text-decoration-none login_provider_box d-flex justify-content-center align-items-center" href="{{ route('user.socialite.redirect', ['locale'=>request()->route()->locale, 'method'=>1]) }}">
                                                <img class="login_provider_icon" src="{{ asset('/res/images/icons/unsplash.png') }}" alt="Uns">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mt-5 p-0 pt-1 pb-5 col-xl-7 col-10">
                                        <p class="text_light cursor_pointer">
                                            Du hast noch keinen Account?
                                            <a class="text_lila text_lila_hoover cursor_hand" href="{{ route('user.register_page', ['locale'=>request()->route()->parameter('locale')]) }}">
                                                Jetzt Registrieren
                                            </a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1">
    </div>
@endsection

@section('optionalJS')
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <script src="{{ asset('/scripts/quick_load_animations/button_load.js') }}"></script>
    <script src="{{ asset('/scripts/form_validation/authform.js') }}"></script>
@endsection
