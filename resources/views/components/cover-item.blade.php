<div class="cover-item {{ $cover->id==1 ? 'col-12':'col-6'}}">
    <a href="{{ route('activitat', ['slug' => $cover->url]) }}">
        <div class="cover-poster">
            <img src="{{ asset('storage/media') . '/' . $cover->img_url }}" class="{{ $cover->id==1 ? 'poster-cover-top':'poster-cover'}}">
            <div class="cover-info">
                <h2>{{$cover->title}}</h2>
            </div>
        </div>
    </a>
</div>
