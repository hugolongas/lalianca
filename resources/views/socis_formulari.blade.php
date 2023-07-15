@extends('layouts.master')
@section('bodyClass', 'socis')
@section('title', "Ateneu l'Aliança | Socis")
@section('content')
    <section id="soci-formulari" class="container page">
        <h1 class="title">
            Formulari d'inscripció
        </h1>
        <form id="activitats_form" class="activitats-form" action="{{ route('socis.store') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>Informació básica</h3>
                        </div>
                        <div class="card-text">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="name">Nom:</label>
                                    <input type="text" class="form-control" placeholder="Nom" id="name"
                                        name="name" value="{{ old('name') }}" tabindex="1" />
                                    @if ($errors->has('name'))
                                        <span class="error-message">Has d'indicar el nom</span>
                                    @endif
                                </div>
                                <div class="form-group col-6">
                                    <label for="surname">Cognoms</label>
                                    <input type="text" class="form-control" placeholder="Cognoms" id="surname"
                                        name="surname" value="{{ old('surname') }}" tabindex="2" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="dni">Dni:</label>
                                    <input type="text" class="form-control" placeholder="Dni" id="dni"
                                        name="dni" value="{{ old('dni') }}" tabindex="3" />
                                    @if ($errors->has('dni'))
                                        <span class="error-message">Has d'indicar el dni</span>
                                    @endif
                                </div>
                                <div class="form-group col-6">
                                    <label for="birthDate">Data naixement</label>
                                    <input type="text" class="form-control" placeholder="Data naixement" id="surname"
                                        name="birthDate" value="{{ old('birthDate') }}" tabindex="4" />
                                        @if ($errors->has('birthDate'))
                                        <span class="error-message">Has d'indicar una data de naixement</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="mobile">Telèfon mòbil:</label>
                                    <input type="mobile" class="form-control" placeholder="Telèfon mòbil" id="mobile"
                                        name="mobile" value="{{ old('mobile') }}" tabindex="5" />
                                    @if ($errors->has('mobile'))
                                        <span class="error-message">Has d'indicar un telèfon mobil</span>
                                    @endif
                                </div>
                                <div class="form-group col-6">
                                    <label for="email">Correu-e</label>
                                    <input type="text" class="form-control" placeholder="Correu-e" id="email"
                                        name="email" value="{{ old('email') }}" tabindex="6" />
                                        @if ($errors->has('email'))
                                        <span class="error-message">Has d'indicar un correu-e</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center ">
            <button type="submit" class="btn btn-outline-primary " style="padding:8px 100px;margin-top:25px; ">
                Enviar
            </button>
        </div>
    </form>
    </section>
@stop

@section('css')

@stop
@push('scripts')
@endpush
@section('meta')
    <meta name="robots" content="all">
@stop
