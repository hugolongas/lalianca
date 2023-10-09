@extends('admin.layouts.master', ['body_class' => 'portada editar'])
@section('content')
    <div class="options-menu">
        <a href="{{ route('admin.portada') }}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i> Volver</a>
    </div>
    <h2>Modificar destacat</h2>
    <form id="portada_form" class="portada-form" action="{{ route('admin.portada.update', $cover) }}"
        method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
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
                                        name="title" value="{{ old('title', $cover->title) }}" tabindex="1" />
                                    @if ($errors->has('title'))
                                        <span class="error-message">Has d'indicar el nom de l'activitat</span>
                                    @endif
                                </div>
                                <div class="form-group col-12">
                                    <label for="resume">Url*</label>
                                    <input type="text" class="form-control" placeholder="Resum activitat" id="resume"
                                        name="resume" value="{{ old('resume', $cover->url) }}" tabindex="1" />
                                </div>
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
                                        <img id="origImgPoster" src="{{ asset('storage/media') . '/' . $cover->img_url }}" class="img-fluid">
                                        <canvas id="imgPoster"></canvas>
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
                Actualitzar
            </button>
        </div>
    </form>
@stop
@push('scripts')

    <script type="text/javascript">
        // Start upload preview image
        var imagePosterFile = document.getElementById('imagePosterFile');
        imagePosterFile.addEventListener('change', handleImagePoster, false);
        var origImgPoster = document.getElementById("origImgPoster");

        var canvasPoster = document.getElementById('imgPoster');
        var ctxPoster = canvasPoster.getContext('2d');

        function handleImagePoster(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var img = new Image();
                img.onload = function() {
                    canvasPoster.width = 1110;
                    canvasPoster.height = 375;
                    ctxPoster.drawImage(img, 0, 0, 1110, 375);
                    origImgPoster.style.display = "none";
                }
                img.src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    </script>
@endpush
