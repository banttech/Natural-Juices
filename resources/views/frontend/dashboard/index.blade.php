@extends('layouts.frontend.app')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <!-- <div class="container"> -->
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link @if(isset($active) && $active == 'dashboard') active @endif" id="dashboard-tab" href="{{ url('/myDashboard') }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if(isset($active) && $active == 'my_orders') active @endif" id="orders-tab" href="{{ url('/myOrders') }}"></i>My Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab"href="{{ url('/myOrders') }}"></i>My Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if(isset($active) && $active == 'profile') active @endif" id="account-detail-tab" href="{{ url('/myProfile') }}"><i class="fi-rs-user mr-10"></i>My Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if(isset($active) && $active == 'change_pass') active @endif" id="account-detail-tab" href="{{ url('changePassword') }}"><i class="fi-rs-lock mr-10"></i>Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if(isset($active) && $active == 'manage_address') active @endif" id="address-tab" href="{{ url('/manageAddress') }}"><i class="fi-rs-marker mr-10"></i>Manage Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                @yield('myDashboardContent')
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
