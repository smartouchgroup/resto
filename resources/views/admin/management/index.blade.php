@extends('admin.layouts.main')
@section('content')
    @include('admin.components.header')
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
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/themes/semi-dark-layout.css') }}">
    @include('admin.components.horizontalBar')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Administrateurs</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Liste des administrateurs</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="nested_error_block"></div>
                @if (!$errors->isEmpty())
                    <div class="alert alert-danger mt-1 alert-dismissible" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-info me-50">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span>Il y'a eu une erreur avec l'ajout de cet administrateur</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mt-1 alert-dismissible" role="alert">
                        <div class="alert-body d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-info me-50">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span>{{ $message }}</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Liste des administrateurs</h4>
                                <button class="dt-button create-new btn btn-primary" tabindex="0"
                                    aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal"
                                    data-bs-target="#modals-slide-in"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>Ajouter un administrateur</span></button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom(s)</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($managers as $manager)
                                            <tr>
                                                <td>
                                                    {{ $manager->firstname }}
                                                </td>
                                                <td>
                                                    {{ $manager->lastname }}
                                                </td>
                                                <td>
                                                    {{ $manager->email }}
                                                </td>
                                                <td>
                                                    {{ $manager->phone }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($manager->status == true)
                                               <a href="{{ route('desactivate',$manager->id) }}">
                                                <button type="submit" class="btn btn-danger">
                                                    Désactiver
                                                </button>
                                            </a>
                                               @else
                                               <a href="{{ route('activate',$manager->id) }}">
                                                    <button type="submit" class="btn btn-success">
                                                        Activer
                                                    </button>
                                                </a>
                                               @endif
                                                </td>

                                                <td class="text-center">
                                                    <a href="{{ route('removeManager',$manager->id) }}" >
                                                        <button type="submit"
                                                            class="dropdown-item ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24" fill="none"
                                                                stroke="#EA5455" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                class="feather feather-trash me-50">
                                                                <polyline points="3 6 5 6 21 6" class="text-danger">
                                                                </polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                            </svg>
                                                            <span class="text-danger ">Supprimer</span>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <p class="mx-auto small">Aucun administrateur disponible</p>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $managers->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade show" id="modals-slide-in" aria-modal="true">
                        <div class="modal-dialog sidebar-sm">
                            <form action="{{ route('addManager') }}" method="post"
                                class="add-new-record modal-content pt-0">
                                @csrf
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">Formulaire d'ajout d'administrateur
                                    </h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="mb-1">
                                        <label class="form-label" for="firstname">Nom </label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="user"></i></span>
                                            <input type="text" id="firstname" class="form-control" name="firstname"
                                                placeholder="Entrez le nom "
                                                @if (old('firstname')) value="{{ old('firstname') }}" @endif
                                                required />
                                            @error('firstname')
                                                <div class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-info me-50">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12" y2="12">
                                                        </line>
                                                        <line x1="12" y1="8" x2="12.01" y2="8">
                                                        </line>
                                                    </svg>
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror
                                        </div>
                                        <label class="form-label" for="lastname">Prénom(s) </label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i data-feather="user"></i></span>
                                            <input type="text" id="firstname" class="form-control" name="lastname"
                                                placeholder="Entrez le prénom"
                                                @if (old('lastname')) value="{{ old('lastname') }}" @endif
                                                required />
                                            @error('lastname')
                                                <div class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-info me-50">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12" y2="12">
                                                        </line>
                                                        <line x1="12" y1="8" x2="12.01" y2="8">
                                                        </line>
                                                    </svg>
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="email">Email
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="mail"></i></span>
                                                <input type="email" id="email" class="form-control" name="email"
                                                    placeholder="Entrez l'adresse email"
                                                    @if (old('email')) value="{{ old('email') }}" @endif
                                                    required />
                                            </div>
                                            @error('confirm_email')
                                                <div class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-info me-50">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12" y2="12">
                                                        </line>
                                                        <line x1="12" y1="8" x2="12.01" y2="8">
                                                        </line>
                                                    </svg>
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="email">Téléphone (Entrer le numéro sans
                                                indicatif)
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>
                                                <input type="number" id="number" class="form-control" name="phone"
                                                    placeholder="Entrez le numero de téléphone"
                                                    @if (old('phone')) value="{{ old('phone') }}" @endif
                                                    required />
                                            </div>
                                            @error('phone')
                                                <div class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-info me-50">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="16" x2="12" y2="12">
                                                        </line>
                                                        <line x1="12" y1="8" x2="12.01" y2="8">
                                                        </line>
                                                    </svg>
                                                    <small>{{ $message }}</small>
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary data-submit me-1">Ajouter</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @include('admin.components.footer')
    <script src="{{ asset('js/changeStatus.js') }}"></script>
@endsection
