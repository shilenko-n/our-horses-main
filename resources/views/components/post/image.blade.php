@props([
    'src' => '',
    'title' => ''
])

<figure>
    <picture class="post__content-image">
        <img src="{{$src}}" alt="" />
    </picture>
    <figcaption>{{$title}}</figcaption>
</figure>
