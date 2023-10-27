@extends('admin.layouts.master', ['body_class' => 'categories'])
@section('content')
    <div class="options-menu">
        <a href="{{ route('admin.categories') }}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i> Volver</a>
    </div>
    <h2>Crear Categoria</h2>
    <form id="categories_form" class="categories-form" action="{{ route('admin.categories.store') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-category">
                            <h3>Informació básica</h3>
                        </div>
                        <div class="card-text">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="category">Categoria*</label>
                                    <input type="text" class="form-control" placeholder="categoria*" id="category"
                                        name="category" value="{{ old('category') }}" tabindex="1" />
                                    @if ($errors->has('category'))
                                        <span class="error-message">Has d'indicar el nom de la categoria</span>
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
