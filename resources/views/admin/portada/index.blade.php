@extends('admin.layouts.master', ['body_class' => 'portada'])
@section('css')

@stop
@section('js')
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        {{ $covers }}
        @for ($i = 0; $i < 3; $i++)
            <div class="col" style="border:1px solid black;max-width:400px;height:500px;margin:5px">
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
                <a href="{{route('admin.portada.edit', ['cover' => $covers[$i]])}}" class="edit btn btn-primary btn.sm">Editar</a>
            </div>
        @endfor
    </div>
@stop
@push('scripts')
    <script></script>
@endpush
