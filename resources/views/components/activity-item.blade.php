@php
    \Carbon\Carbon::setlocale(config('app.locale'));
@endphp

<div class="activitat-item">
    <a href="{{ route('activitat', ['slug' => $activitat->url]) }}">
        <div class="activitat-poster">
            <img src="{{ asset('storage/media') . '/' . $activitat->img_cover }}"
                class="img-fluid">
        </div>
        <div class="activitat-info">
            <div class="activitat-title">
                {{ $activitat->title }}
            </div>
            <div class="activitat-date">                
                <div class="sub-title">{{ucfirst(\Carbon\Carbon::parse($activitat->date)->translatedFormat('l j F Y'))}}</div>
                <div class="sub-title">{{ $activitat->time }}</div>               
                
            </div>
            <div class="activitat-preu">
                <span class="sub-title">{{$activitat->price}}</span>
            </div>
            <div class="activitat-resum">
                {{ $activitat->resume }}
            </div>
        </div>
    </a>
</div>