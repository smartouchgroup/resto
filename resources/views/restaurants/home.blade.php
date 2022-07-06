@extends('restaurants.layouts.main')
@section('content')
    <!-- BEGIN: Header-->
    @include('restaurants.components.header')
    @include('restaurants.components.horizontalBar')

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
                        <!-- Medal Card -->
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body">
                                    <h5>Bienvenue Restaurant <span class="text-uppercase">{{ Auth::user()->firstname }}</span></h5>
                                    <p class="card-text font-small-3">{{$getSlogan->slogan}}</p>
                                    <a href="{{ route('org.commands') }}">
                                        <button type="button" class="btn btn-primary">Commandes</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Mes Statistiques </h4>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    @if (count($getNumberCommand) === 0)
                                                    <h4 class="fw-bolder mb-0">Aucune</h4>
                                                    @else
                                                         <h4 class="fw-bolder mb-0">{{ count($getNumberCommand) }}</h4>
                                                    @endif
                                                    <p class="card-text font-small-3 mb-0">Commandes en cours</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    @if (count($getNumberValidateCommand) === 0)
                                                         <h4 class="fw-bolder mb-0">Aucune</h4>
                                                    @else
                                                         <h4 class="fw-bolder mb-0">{{ count($getNumberValidateCommand) }}</h4>
                                                    @endif
                                                    <p class="card-text font-small-3 mb-0">Commandes validées</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    @if (count($getOrg) === 0)
                                                       <h4 class="fw-bolder mb-0">Aucune</h4>
                                                    @else
                                                       <h4 class="fw-bolder mb-0"> {{ count($getOrg) }}</h4>
                                                    @endif
                                                    <p class="card-text font-small-3 mb-0">Structures Partenaires</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">1.423k</h4>
                                                    <p class="card-text font-small-3 mb-0">Products</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('admin.components.footer')
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->
@endsection
