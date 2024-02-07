@extends('admin.layouts.master', ['body_class' => 'portada'])
@section('css')

@stop
@section('js')
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        @for ($i = 0; $i < 3; $i++)
            @if ($i == 0)
                <div class="row">
                    <div class="col-12" style="border:1px solid black;margin:5px; width:100%;height:370px">
                        <div>Titol:{{ $covers[$i]->title }}</div>
                        <div>Url:{{ $covers[$i]->url }}</div>
                        <div>Imatge:
                            @if ($covers[$i]->img_url == null)
                                <img class="img-fluid" style="width: 100%;" src="{{ asset('storage') }}/no_image.jpg" />
                            @else
                                <img class="img-fluid" style="width: 100px;"
                                    src="{{ asset('storage/media') . '/' . $covers[$i]->img_url }}" />
                            @endif
                        </div>
                        <a href="{{ route('admin.portada.edit', ['cover' => $covers[$i]]) }}"
                            class="edit btn btn-primary btn.sm">Editar</a>
                    </div>
                </div>
            @endif
            @if ($i == 1)
                <div class="row">
                    <div class="col-6" style="border:1px solid black;padding:5px">
                        <div>Titol:{{ $covers[$i]->title }}</div>
                        <div>Url:{{ $covers[$i]->url }}</div>
                        <div>Imatge:
                            @if ($covers[$i]->img_url == null)
                                <img class="img-fluid" style="width: 100%;" src="{{ asset('storage') }}/no_image.jpg" />
                            @else
                                <img class="img-fluid" style="width: 100px;"
                                    src="{{ asset('storage/media') . '/' . $covers[$i]->img_url }}" />
                            @endif
                        </div>
                        <a href="{{ route('admin.portada.edit', ['cover' => $covers[$i]]) }}"
                            class="edit btn btn-primary btn.sm">Editar</a>
                    </div>
            @endif
            @if ($i == 2)
                <div class="col-6" style="border:1px solid black;padding:5px">
                    <div>Titol:{{ $covers[$i]->title }}</div>
                    <div>Url:{{ $covers[$i]->url }}</div>
                    <div>Imatge:
                        @if ($covers[$i]->img_url == null)
                            <img class="img-fluid" style="width: 100%;" src="{{ asset('storage') }}/no_image.jpg" />
                        @else
                            <img class="img-fluid" style="width: 100px;"
                                src="{{ asset('storage/media') . '/' . $covers[$i]->img_url }}" />
                        @endif
                    </div>
                    <a href="{{ route('admin.portada.edit', ['cover' => $covers[$i]]) }}"
                        class="edit btn btn-primary btn.sm">Editar</a>
                </div>
    </div>
    @endif
    @endfor
    </div>

@stop
@push('scripts')
    <script></script>
@endpush
