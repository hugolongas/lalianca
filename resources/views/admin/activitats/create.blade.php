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
        <a href="{{ route('admin.activitats') }}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i> Volver</a>
    </div>
    <h2>Crear activitat</h2>
    <form id="activitats_form" class="activitats-form" action="{{ route('admin.activitats.store') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>Informació básica</h3>
                        </div>
                        <div class="card-text">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="title">Activitat*</label>
                                    <input type="text" class="form-control" placeholder="Activitat*" id="title"
                                        name="title" value="{{ old('title') }}" tabindex="1" />
                                    @if ($errors->has('title'))
                                        <span class="error-message">Has d'indicar el nom de l'activitat</span>
                                    @endif
                                </div>
                                <div class="form-group col-12">
                                    <label for="resume">Resum activitat</label>
                                    <input type="text" class="form-control" placeholder="Resum activitat" id="resume"
                                        name="resume" value="{{ old('resume') }}" tabindex="2" />
                                </div>
                                <div class="form-group col-12">
                                    <label for="resume">Categoria activitat</label>
                                    <select id="category" name="category" class="form-control" tabindex="3">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if (old('category')== $category->id) {{ 'selected' }} @endif>
                                            {{$category->category}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                            <span class="error-message">Has de seleccionar alguna categoria</span>
                                        @endif                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>Informació Extra</h3>
                        </div>
                        <div class="card-text">
                            <div class="date">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="date">Data Activitat</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" name="date" id="date" value="{{ old('date') }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="time">Hora Activitat</label>
                                        <div class="input-group">
                                            <input type="time" class="form-control" name="time" id="time" value="{{ old('time') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <div class="form-row price-form">
                                    <div class="form-group col-12">
                                        <label for="price">Preu*</label>
                                        <input type="text" class="form-control" placeholder="Preu*" id="price"
                                            name="price" value="{{ old('price') }}" tabindex="3" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="buy_url">Url de compra</label>
                                <input type="text" class="form-control" placeholder="Url de compra" id="buy_url"
                                    name="buy_url" value="{{ old('buy_url') }}" tabindex="1" />
                            </div>
                            <div class="form-group">
                                <label for="description">Descripció</label>
                                <textarea class="form-control" id="description" name="description" rows="6"
                                    tabindex="6">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Imatges Activitat
                        </div>
                        <div class="card-text">
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="container-fluid">
                                        <label> Imatge de poster (250px x 360px)</label><br />
                                        <input type="file" id="imagePosterFile" name="imagePosterFile" />
                                        <canvas id="imgPoster"></canvas>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="container-fluid">
                                        <label> Imatge de poster (250px x 250px)</label><br />
                                        <input type="file" id="imageCoverFile" name="imageCoverFile" />
                                        <canvas id="imgCover"></canvas>
                                    </div>
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
    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            weekStart: 1,
            todayBtn: true,
            language: "ca",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });

        function valueChanged() {
            if ($('.free').is(":checked")){
                $("#is_free").val(true);
                $(".price-form").hide();
            }
            else{
                $("#is_free").val(false);
                $(".price-form").show();
            }
        }
    </script>

    <script type="text/javascript">
        // Start upload preview image
        var imagePosterFile = document.getElementById('imagePosterFile');
        imagePosterFile.addEventListener('change', handleImagePoster, false);

        var canvasPoster = document.getElementById('imgPoster');
        var ctxPoster = canvasPoster.getContext('2d');

        var imageCoverFile = document.getElementById('imageCoverFile');
        imageCoverFile.addEventListener('change', handleImageCover, false);


        var canvasCover = document.getElementById('imgCover');
        var ctxCover = canvasCover.getContext('2d');

        function handleImagePoster(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var img = new Image();
                img.onload = function() {
                    canvasPoster.width = 250;
                    canvasPoster.height = 360;
                    ctxPoster.drawImage(img, 0, 0, 250, 360);
                }
                img.src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        }

        function handleImageCover(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var img = new Image();
                img.onload = function() {
                    canvasCover.width = 250;
                    canvasCover.height = 250;
                    ctxCover.drawImage(img, 0, 0, 250, 250);
                }
                img.src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    </script>
@endpush
