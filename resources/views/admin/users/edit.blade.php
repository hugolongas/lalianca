@extends('admin.layouts.master', ['body_class' => 'activitats'])
@section('css')" />
    <link rel="stylesheet" href="{{ asset('datepicker/css/bootstrap-datepicker3.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@stop
@section('js')
    <script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
    <script src="{{ asset('datepicker/js/bootstrap-datepicker.js') }}"></script>
    <!-- Languaje -->
    <script src="{{ asset('datepicker/locales/bootstrap-datepicker.ca.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
@stop
@section('content')
    <div class="options-menu">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i> Volver</a>
    </div>
    <h2>Crear Usuari</h2>
    <form id="users_form" class="users-form" action="{{ route('admin.users.store') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="name">Nom Complert*</label>
                                    <input type="text" class="form-control" placeholder="Nom Complert*" id="name"
                                        name="name" value="{{ old('name') }}" tabindex="1" />
                                    @if ($errors->has('name'))
                                        <span class="error-message">Has d'indicar un nom </span>
                                    @endif
                                </div>
                                <div class="form-group col-12">
                                    <label for="email">E-mail*</label>
                                    <input type="text" class="form-control" placeholder="E-mail*" id="email"
                                        name="email" value="{{ old('email') }}" tabindex="2" />
                                    @if ($errors->has('email'))
                                        <span class="error-message">Has d'indicar un e-mail valid </span>
                                    @endif
                                </div>
                                <div class="form-group col-12">
                                    <label for="password">Contrasenya (si no indiques cap, es creará una aleatoria)</label>
                                    <input type="text" class="form-control" placeholder="Contrasenya" id="password"
                                        name="password" value="{{ old('password') }}" tabindex="2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <h3>Rols*</h3>                                    
                                    @foreach ($roles as $rol)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="{{ $rol }}"
                                            id="rol-{{ $rol->id }}" name="rol[]">
                                        <label class="form-check-label" for="rol-{{ $rol->id }}">
                                            {{ $rol->name }} ({{ $rol->description }})
                                        </label>
                                    </div>
                                    @endforeach
                                    @if ($errors->has('rol'))
                                        <span class="error-message">Has d'indicar un rol </span>
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
                Crear
            </button>
        </div>
    </form>
@stop
@push('scripts')
@endpush
