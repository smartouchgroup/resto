@extends('admin.layouts.main')
@section('content')
@include('admin.components.header')
@include('admin.components.horizontalBar')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/semi-dark-layout.css') }}">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">@if (Auth::user()->roleId == 1)
Super administrateur
                            @else
                            Administrateur
                            @endif</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Détails
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="row">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success mt-1 alert-dismissible" role="alert">
                                        <div class="alert-body d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-info me-50">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="offset-4 col-4 mb-2  ">
                                    <div class="mt-1 p-1 border rounded text-center" style="width: fit-content;">
                                        <p class="small">Photo</p>
                                        @if (Auth::user()->profile !== null)
                                            <img src="{{ asset('storage/avatars' . '/' . Auth::user()->profile) }}"
                                                alt="{{ Auth::user()->firstname }}" class="mx-auto" height="90"
                                                width="100">
                                        @else
                                            <img src="{{  asset('dashboard/app-assets/images/avatar_admin.png') }}" class="mx-auto" height="100" width="100" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <small class="small">Nom et prénom </small><br>
                                        <p class="p-1 bg-light border rounded text-italic">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <small class="small">Adresse email</small><br>
                                        <p class="p-1 bg-light border rounded text-italic">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <small class="small">Numéro de téléphone</small><br>
                                        <p class="p-1 bg-light border rounded text-italic">{{ Auth::user()->phone }}</p>
                                    </div>
                                </div>
                                @if (Auth::user()->roleId == 1)
                                <div class="col-md-6">
                                    <form action="{{ route('adminName') }}" method="post" class="mt-2">
                                        @csrf
                                        <small class="small">Changer de nom </small>
                                        <input type="text"  class="form-control" name="firstname"
                                            value="{{ Auth::user()->firstname }}"
                                            placeholder="Entrez le nom du restaurant" />
                                            @error('firstname')
                                            <div class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-info me-50">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                </svg>
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <button type="submit"
                                            class="btn btn-primary data-submit me-1 mt-1">Modifier</button>
                                    </form>
                                </div>
                                @else
                                <div class="col-md-12">
                                    <form action="{{ route('adminData') }}" method="post" class="mt-2">
                                        @csrf
                                        <small class="small">Changer de nom </small>
                                        <input type="text"  class="form-control" name="firstname"
                                            value="{{ Auth::user()->firstname }}"
                                            placeholder="Entrez le nom du restaurant" />
                                            @error('firstname')
                                            <div class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-info me-50">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                </svg>
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror

                                      </div>
                                        <div class="col-md-12 mt-2">

                                            <small class="small">Changer de prénom </small>
                                            <input type="text"  class="form-control" name="lastname"
                                                value="{{ Auth::user()->lastname }}"
                                                placeholder="Entrez le prenom" />
                                                @error('lastname')
                                                <div class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-info me-50">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                    </svg>
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror

                                            <button type="submit"
                                                class="btn btn-primary data-submit me-1 mt-1">Modifier</button>
                                    </div>
                                    </form>


                                @endif



                                <div class="col-md-6 mt-2">
                                    <form action="{{ route('adminPhone') }}" method="post">
                                        @csrf
                                        <small class="small">Changer de numéro de téléphone</small>
                                        <input type="number"  class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                                            placeholder="Entrez votre nouveau numéro de téléphone" />
                                            @error('phone')
                                            <div class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-info me-50">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                </svg>
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <button type="submit"
                                            class="btn btn-primary data-submit me-1 mt-1">Modifier</button>
                                    </form>
                                </div>
                                <div class="col-md-6 my-2">
                                    <form action="{{ route('adminEmail') }}" method="post">
                                        @csrf
                                        <small class="small">Changer d'email</small>
                                        <input type="text"  class="form-control" name="email" value="{{ Auth::user()->email }}"
                                            placeholder="Entrez votre nouveau email" />
                                            @error('email')
                                            <div class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-info me-50">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                </svg>
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <button type="submit"
                                            class="btn btn-primary data-submit me-1 mt-1">Modifier</button>
                                    </form>
                                </div>
                                <div class="col-md-12 my-2">
                                    <form action="{{ route('adminPassword') }}" method="post">
                                        @csrf
                                        <small class="small">Changer de mot de passe</small>
                                        <input type="password"  class="form-control mb-2" name="password"
                                            placeholder="Entrez votre nouveau mot de passe" />
                                            @error('password')
                                            <div class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-info me-50">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                </svg>
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror

                                        <small class="small ">Confirmer le mot de passe</small>
                                        <input type="password"  class="form-control" name="confirm_password"
                                            placeholder="confirmer votre nouveau mot de passe" />
                                            @error('confirm_password')
                                            <div class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-info me-50">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                </svg>
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                        <button type="submit"
                                        class="btn btn-primary data-submit me-1 mt-1">Modifier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('admin.components.footer')
    @endsection
