@props([
    'user' => null,
])

<div class="about-user">
    <div class="about-user__about">
        <div class="about-user__heading">Обо мне</div>
        <div class="about-user__description">{{ $user->description }}</div>
        <div class="about-user__registered">На сайте 7 лет</div>
        <div class="about-user__comments">Написал 174 комментария</div>
    </div>
    <div class="about-user__links">
        <a class="about-user__link" href="/front/pages/profile/subscribers/subscribers">
            <div class="about-user__link-text">Подписчики</div>
            <div class="about-user__link-number">{{ $user->subscriptions()->count() }}</div>
        </a>
        <a class="about-user__link" href="/front/pages/profile/subscribers/horses">
            <div class="about-user__link-text">Подписки на лошадей</div>
            <div class="about-user__link-number">{{ count($user->subscribedHorse()) }}</div>
        </a>
        <a class="about-user__link" href="/front/pages/profile/subscribers/users">
            <div class="about-user__link-text">Подписки на людей</div>
            <div class="about-user__link-number">{{ $user->subscriptions()->count() }}</div>
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
