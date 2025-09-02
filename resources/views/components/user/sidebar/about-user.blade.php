@props([
    'user' => null,
])

@php
    $isSelf = Auth::check() && Auth::id() == $user->id;
@endphp

<div class="about-user">
    <div class="about-user__about">
        <div class="about-user__heading">Обо мне</div>
        <div class="about-user__description">{{ $user->description }}</div>
        <div class="about-user__registered">На сайте 7 лет</div>
        <div class="about-user__comments">Написал 174 комментария</div>
    </div>
    <div class="about-user__links">
        <a
            class="about-user__link"
            href="{{$isSelf ? route('pages.user.subscribers.own') : route('pages.user.subscribers.own.nickname', $user->nickname)}}"
        >
            <div class="about-user__link-text">Подписчики</div>
            <div class="about-user__link-number">{{ $user->subscriptions()->count() }}</div>
        </a>
        <a class="about-user__link" href="/front/pages/profile/subscribers/horses">
            <div class="about-user__link-text">Подписки на лошадей</div>
            <div class="about-user__link-number">{{ $user->horseSubscriptions()->count() }}</div>
        </a>
        <a
            class="about-user__link"
            href="{{$isSelf
                ? route('pages.user.subscribers.users')
                : route('pages.user.subscribers.users.nickname', $user->nickname)
            }}"
        >
            <div class="about-user__link-text">Подписки на людей</div>
            <div class="about-user__link-number">{{ $user->userSubscriptions()->count() }}</div>
        </a>
        <a class="about-user__link" href="/front/pages/profile/subscribers/breeds">
            <div class="about-user__link-text">Подписки на породы</div>
            <div class="about-user__link-number">{{ count($user->subscribedBreed()) }}</div>
        </a>
        <a class="about-user__link" href="/front/pages/profile/mentions">
            <div class="about-user__link-text">Упоминания</div>
            <div class="about-user__link-number">25</div>
        </a>
    </div>
</div>
