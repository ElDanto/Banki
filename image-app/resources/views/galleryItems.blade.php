@foreach ($images as $image)
    {{ $image->setDateTime() }}
    <div class="item" style="display: grid; justify-items: center;">
        <img class="thumb" src="/img/{{$image->name}}" alt="!!" width="300px" onClick="display_full($(this))">
        <h2 class="img-name">{{ $image->name }}</h2>
        <span class="image-date">{{ $image->date }}</span>
        <span class="image-time">{{ $image->time }}</span>
        <a href="/archives/{{pathinfo($image->name, PATHINFO_FILENAME)}}.zip" download>Скачать архив</a>
    </div>
@endforeach