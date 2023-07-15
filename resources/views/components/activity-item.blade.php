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
                <span class="sub-title">Data:</span> {{ date('d F Y', strtotime($activitat->date)) }} / <span class="sub-title">Hora:</span>
                <span class="sub-title">Data:</span> {{\Carbon\Carbon::parse($activitat->date)->format('j F, Y')}} / <span class="sub-title">Hora:</span>
                
                {{ $activitat->time }}
            </div>
            <div class="activitat-preu">
                <span class="sub-title">Preu:</span> {{$activitat->price}}
            </div>
            <div class="activitat-resum">
                {{ $activitat->resume }}
            </div>
        </div>
    </a>
</div>