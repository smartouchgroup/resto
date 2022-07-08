@extends('organization.layouts.main')
@section('content')
    <!-- BEGIN: Header-->

@include('organization.components.header')
    <!-- BEGIN: Main Menu-->
@include('organization.components.horizontalBar')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <h5>Bienvenue <span>{{ Auth::user()->firstname }}</span></h5>
                                    <p class="card-text font-small-3">{{ $getSlogan->slogan }}</p>
                                    <a href="{{ asset('org/add_employees') }}">
                                        <button type="button" class="btn btn-primary">Employé</button>
                                    </a>
                                    <img src="{{ asset('storage/avatars/' . Auth::user()->profile) }}" class="congratulation-medal me-75 mt-3" height="60" width="50" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistiques</h4>
                                    <div class="d-flex align-items-center">
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="users" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ count($employees) === 0 ? 'Aucun' :  count($employees)}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Employés</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="square" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{count($groups) === 0 ?  'Aucun' : count($groups)}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Groupes</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="coffee" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{count($getRestaurants) === 0 ? 'Aucun' : count($getRestaurants)}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Restaurants</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row match-height">
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <span class='text-center'>
        @include('organization.components.footer')
    </span>

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@endsection