@extends('employee.layouts.main')
@section('title') Portefeuille @endsection
@section('content')
<x-parts.container type="container-fluid">
    <x-parts.main>
        <div class="container-fluid mt-3 mx-auto">
            <h2 class="dishes_title mb-2 text-center">Mon portefeuille</h2>
            <div class="row mt-2">
                <div class="col-lg-6 col-md-6 col-xs-12 mx-auto ">
                    <div class="part mt-1 card card-body">
                        <h4 class="family_popone text-center">Mon solde actuel</h4>
                        @if($message = Session::get('success'))
                        <div style="width: 98%;" class="mx-auto">
                            <div class="alert alert-danger mt-1 alert-dismissible" role="alert">
                                <div class="alert-body d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info me-50"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                    <span>{{$message}}</span>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                        <div class="row justify-content-center  text-center">
                            <h1 class="family_popone py-4 display-1">{{ (Auth::user()->custom->account->amount )}} FCFA</h1>
                        </div>
                        <div class="form-group text-center my-2">
                            <a href="{{ route('account.deposit') }}">
                                <button type="submit" class="outline-none border-0 rounded">
                                    Recharger
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12 col-xl-6">
                    <div class="part mt-2">
                        <h4 class="family_popone">Historiques de mes dépôts</h4>
                        <div class="row justify-content-center mt-2">

                            <div class="col-12 mt-1">
                                <div class="rounded bg-white deposit_historic">
                                    <div class="dh_img">
                                        <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <g data-name="11. Phone" id="_11._Phone">
                                                <path d="M14,6a1,1,0,0,0,0-2H8A1,1,0,0,0,8,6Z" />
                                                <path
                                                    d="M21,8.84v-4A4.8,4.8,0,0,0,16.21,0H5.79A4.8,4.8,0,0,0,1,4.79V27.21A4.8,4.8,0,0,0,5.79,32H16.21A4.8,4.8,0,0,0,21,27.21v-.05A10,10,0,0,0,21,8.84ZM16.21,30H5.79A2.79,2.79,0,0,1,3,27.21V4.79A2.79,2.79,0,0,1,5.79,2H16.21A2.79,2.79,0,0,1,19,4.79V8.2A10.2,10.2,0,0,0,17,8a9.92,9.92,0,0,0-7,2.89V10a1,1,0,0,0-2,0V26a1,1,0,0,0,2,0v-.89A9.92,9.92,0,0,0,17,28a10.19,10.19,0,0,0,1.93-.19A2.79,2.79,0,0,1,16.21,30ZM17,26a8,8,0,0,1-7-4.14V14.14A8,8,0,1,1,17,26Z" />
                                                <path
                                                    d="M17,15h2a1,1,0,0,0,0-2H18a1,1,0,0,0-2,0v.18A3,3,0,0,0,17,19a1,1,0,0,1,0,2H15a1,1,0,0,0,0,2h1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,17,17a1,1,0,0,1,0-2Z" />
                                                <path
                                                    d="M30,5H27.41l.3-.29a1,1,0,1,0-1.42-1.42l-2,2a1,1,0,0,0,0,1.42l2,2a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L27.41,7H30a1,1,0,0,0,0-2Z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="dh_text">
                                        <div>
                                            <h5 class="family_popone">Dépôt de 200 fcfa sur votre compte</h5>
                                        </div>
                                        <div>
                                            <span class="small">Dépôt effectué le 13/01/2022</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mt-1">
                                <div class="rounded bg-white deposit_historic">
                                    <div class="dh_img">
                                        <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <g data-name="11. Phone" id="_11._Phone">
                                                <path d="M14,6a1,1,0,0,0,0-2H8A1,1,0,0,0,8,6Z" />
                                                <path
                                                    d="M21,8.84v-4A4.8,4.8,0,0,0,16.21,0H5.79A4.8,4.8,0,0,0,1,4.79V27.21A4.8,4.8,0,0,0,5.79,32H16.21A4.8,4.8,0,0,0,21,27.21v-.05A10,10,0,0,0,21,8.84ZM16.21,30H5.79A2.79,2.79,0,0,1,3,27.21V4.79A2.79,2.79,0,0,1,5.79,2H16.21A2.79,2.79,0,0,1,19,4.79V8.2A10.2,10.2,0,0,0,17,8a9.92,9.92,0,0,0-7,2.89V10a1,1,0,0,0-2,0V26a1,1,0,0,0,2,0v-.89A9.92,9.92,0,0,0,17,28a10.19,10.19,0,0,0,1.93-.19A2.79,2.79,0,0,1,16.21,30ZM17,26a8,8,0,0,1-7-4.14V14.14A8,8,0,1,1,17,26Z" />
                                                <path
                                                    d="M17,15h2a1,1,0,0,0,0-2H18a1,1,0,0,0-2,0v.18A3,3,0,0,0,17,19a1,1,0,0,1,0,2H15a1,1,0,0,0,0,2h1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,17,17a1,1,0,0,1,0-2Z" />
                                                <path
                                                    d="M30,5H27.41l.3-.29a1,1,0,1,0-1.42-1.42l-2,2a1,1,0,0,0,0,1.42l2,2a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L27.41,7H30a1,1,0,0,0,0-2Z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="dh_text">
                                        <div>
                                            <h5 class="family_popone">Dépôt de 200 fcfa sur votre compte</h5>
                                        </div>
                                        <div>
                                            <span class="small">Dépôt effectué le 13/01/2022</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mt-1">
                                <div class="rounded bg-white deposit_historic">
                                    <div class="dh_img">
                                        <svg width="32px" height="32px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <g data-name="11. Phone" id="_11._Phone">
                                                <path d="M14,6a1,1,0,0,0,0-2H8A1,1,0,0,0,8,6Z" />
                                                <path
                                                    d="M21,8.84v-4A4.8,4.8,0,0,0,16.21,0H5.79A4.8,4.8,0,0,0,1,4.79V27.21A4.8,4.8,0,0,0,5.79,32H16.21A4.8,4.8,0,0,0,21,27.21v-.05A10,10,0,0,0,21,8.84ZM16.21,30H5.79A2.79,2.79,0,0,1,3,27.21V4.79A2.79,2.79,0,0,1,5.79,2H16.21A2.79,2.79,0,0,1,19,4.79V8.2A10.2,10.2,0,0,0,17,8a9.92,9.92,0,0,0-7,2.89V10a1,1,0,0,0-2,0V26a1,1,0,0,0,2,0v-.89A9.92,9.92,0,0,0,17,28a10.19,10.19,0,0,0,1.93-.19A2.79,2.79,0,0,1,16.21,30ZM17,26a8,8,0,0,1-7-4.14V14.14A8,8,0,1,1,17,26Z" />
                                                <path
                                                    d="M17,15h2a1,1,0,0,0,0-2H18a1,1,0,0,0-2,0v.18A3,3,0,0,0,17,19a1,1,0,0,1,0,2H15a1,1,0,0,0,0,2h1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,17,17a1,1,0,0,1,0-2Z" />
                                                <path
                                                    d="M30,5H27.41l.3-.29a1,1,0,1,0-1.42-1.42l-2,2a1,1,0,0,0,0,1.42l2,2a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L27.41,7H30a1,1,0,0,0,0-2Z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="dh_text">
                                        <div>
                                            <h5 class="family_popone">Dépôt de 200 fcfa sur votre compte</h5>
                                        </div>
                                        <div>
                                            <span class="small">Dépôt effectué le 13/01/2022</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <button id="smooth_scroll_btn" class="d-none">
            <i data-feather="chevron-up"></i>
        </button>
    </x-parts.main>
</x-parts.container>
@endsection
