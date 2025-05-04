@php
    $marqueElements = getContent('marque.element', false, 15);
@endphp

<div class="marque--section pb-100">
    <div class="container">
        <div class="marque---wrap">
            <div class="marque--slider left-marq">
                @foreach ($marqueElements as $item)
                    <ul class="marquee--item">
                        <li>
                            <img src="{{getImage(getFilePath('marque').'/'.$item->data_values->image)}}" alt="{{$item->data_values->image}}">
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>