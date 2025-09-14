@props([
    'name'  => '',
    'block' => null,
])

<div
    @class([ 'gallery gallery_' . $name, ])
>
    <figure class="post__gallery-item">
        <picture>
            <img src="" alt="" />
        </picture>
        <picture>
            <img src="" alt="" />
        </picture>


        <figcaption>description</figcaption>
    </figure>
</div>
