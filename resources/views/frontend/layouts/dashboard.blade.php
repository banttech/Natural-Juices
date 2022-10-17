<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('admin-assets/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link href="{{ url('admin-assets/assets/css/main.css?v=1.1') }}" rel="stylesheet" type="text/css" />

    <!-- Links For multi-tags -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>     
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>



</head>
<style type="text/css">


.check-box {
    transform: scale(2);
}

input[type="checkbox"] {
    position: relative;
    appearance: none;
    width: 40px;
    height: 20px;
    background: #ccc;
    border-radius: 50px;
    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: 0.4s;
}

input:checked[type="checkbox"] {
    background: #7da6ff;
}

input[type="checkbox"]::after {
    position: absolute;
    content: "";
    width: 20px;
    height: 20px;
    top: 0;
    left: 0;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    transform: scale(1.1);
    transition: 0.4s;
}

input:checked[type="checkbox"]::after {
    left: 50%;
}

</style>
<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="index.html" class="brand-wrap">
                <img src="{{ url('admin-assets/assets/imgs/theme/logo.svg') }}" class="logo" alt="Nest Dashboard" />
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"><i
                        class="text-muted material-icons md-menu_open"></i></button>
            </div>
        </div>
         <nav>
            <ul class="menu-aside">
                <li class="menu-item @if(isset($active) && $active == 'dashboard') active @endif" >
                    <a class="menu-link" href="{{ url('/myDashboard') }}">
                        <i class="icon material-icons md-home"></i>
                        <span class="text">My Dashboard</span>
                    </a>
                </li>
                <li class="menu-item @if(isset($active) && $active == 'dashboard') active @endif" >
                    <a class="menu-link" href="{{ url('#') }}">
                        <i class="icon material-icons md-shopping_cart"></i>
                        <span class="text">My Orders</span>
                    </a>
                </li>
                <li class="menu-item @if(isset($active) && $active == 'dashboard') active @endif" >
                    <a class="menu-link" href="{{ url('#') }}">
                        <i class="icon material-icons md-comment"></i>
                        <span class="text">My Reviews</span>
                    </a>
                </li>
                <li class="menu-item @if(isset($active) && $active == 'dashboard') active @endif" >
                    <a class="menu-link" href="{{ url('/myProfile') }}">
                        <i class="icon material-icons md-person"></i>
                        <span class="text">My Profile</span>
                    </a>
                </li>
                <li class="menu-item @if(isset($active) && $active == 'dashboard') active @endif" >
                    <a class="menu-link" href="{{ url('changePassword') }}">
                        <i class="icon material-icons md-lock"></i>
                        <span class="text">Change Password</span>
                    </a>
                </li>
                <li class="menu-item @if(isset($active) && $active == 'dashboard') active @endif" >
                    <a class="menu-link" href="{{ url('/manageAddress') }}">
                        <i class="icon material-icons md-home"></i>
                        <span class="text">Manage Address</span>
                    </a>
                </li>
                <li class="menu-item @if(isset($active) && $active == 'dashboard') active @endif" >
                    <a class="menu-link" href="{{ route('logout') }}">
                        <i class="icon material-icons md-exit_to_app"></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
                {{-- @auth
                {{auth()->user()->name}}&nbsp;
                <div class="text-end">
                  <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
              @endauth --}}
            </ul>
            <br />
            <br />
        </nav>
    </aside>
    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
                <form class="searchform">
                    <div class="input-group">
                        <input list="search_terms" type="text" class="form-control" placeholder="Search term" />
                        <button class="btn btn-light bg" type="button"><i
                                class="material-icons md-search"></i></button>
                    </div>
                    <datalist id="search_terms">
                        <option value="Products"></option>
                        <option value="New orders"></option>
                        <option value="Apple iphone"></option>
                        <option value="Ahmed Hassan"></option>
                    </datalist>
                </form>
            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i
                        class="material-icons md-apps"></i></button>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#">
                            <i class="material-icons md-notifications animation-shake"></i>
                            <span class="badge rounded-pill">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"> <i
                                class="material-icons md-nights_stay"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon"><i
                                class="material-icons md-cast"></i></a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage"
                            aria-expanded="false"><i class="material-icons md-public"></i></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                            <a class="dropdown-item text-brand" href="#"><img
                                    src="{{ url('admin-assets/assets/imgs/theme/flag-us.png') }}"
                                    alt="English" />English</a>
                            <a class="dropdown-item" href="#"><img
                                    src="{{ url('admin-assets/assets/imgs/theme/flag-fr.png') }}"
                                    alt="Français" />Français</a>
                            <a class="dropdown-item" href="#"><img
                                    src="{{ url('admin-assets/assets/imgs/theme/flag-jp.png') }}" alt="Français" />日本語</a>
                            <a class="dropdown-item" href="#"><img
                                    src="{{ url('admin-assets/assets/imgs/theme/flag-cn.png') }}" alt="Français" />中国人</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount"
                            aria-expanded="false"> <img class="img-xs rounded-circle"
                                src="{{ url('admin-assets/assets/imgs/people/avatar-2.png') }}" alt="User" /></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="#"><i
                                    class="material-icons md-perm_identity"></i>Edit Profile</a>
                           {{--  <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account
                                Settings</a>
                            <a class="dropdown-item" href="#"><i
                                    class="material-icons md-account_balance_wallet"></i>Wallet</a>
                            <a class="dropdown-item" href="#"><i
                                    class="material-icons md-receipt"></i>Billing</a>
                            <a class="dropdown-item" href="#"><i
                                    class="material-icons md-help_outline"></i>Help center</a>
                            <div class="dropdown-divider"></div> --}}
                            <a class="dropdown-item text-danger" href="{{ url('logout') }}"><i
                                    class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        @yield('content')
        <!-- content-main end// -->
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    &copy; Nest - HTML Ecommerce Template .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">All rights reserved</div>
                </div>
            </div>
        </footer>
    </main>
    <script src="{{ url('admin-assets/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('admin-assets/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('admin-assets/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ url('admin-assets/assets/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('admin-assets/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <script src="{{ url('admin-assets/assets/js/vendors/chart.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ url('admin-assets/assets/js/main.js?v=1.1" type="text/javascript') }}"></script>
    <script src="{{ url('admin-assets/assets/js/custom-chart.js" type="text/javascript') }}"></script>

</body>

</html>
