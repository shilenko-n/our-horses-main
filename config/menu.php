<?php

use App\Enums\UserRole;

return [

    'main' => [

        UserRole::User->value => [

            [
                'icon' => 'scroll-solid',
                'name' => 'Лента',
                'route' => 'pages.feed' , //pages.feed
            ],
            [
                'icon' => 'fire-solid',
                'name' => 'Самое интересное',
                'route' => '/front/pages/feed/admin/interesting',
            ],
            [
                'icon' => 'clock-solid',
                'name' => 'Актуальные записи',
                'route' => '/front/pages/feed/admin/actual-news',
            ],
            [
                'icon' => 'book-solid',
                'name' => 'Дневники',
                'route' => '/front/pages/feed/admin/horse-diary',
            ],
            [
                'icon' => 'handshake-solid',
                'name' => 'Купить лошадь',
                'route' => '/front/pages/horses/buy',
            ],
            [
                'icon' => 'horse-head-solid',
                'name' => 'Лошади',
                'route' => '/front/pages/horses/breeds',
            ]


        ],

        UserRole::Admin->value => [

            [
                'icon' => 'advertisement-solid',
                'name' => 'Реклама',
                'route' => '/front/pages/admin/advertisement',
            ],
            [
                'icon' => 'article-solid',
                'name' => 'Статьи',
                'route' => '/front/pages/admin/article-hub',
            ],
            [
                'icon' => 'books-solid',
                'name' => 'Справочники',
                'route' => '/front/pages/admin/guide',
            ],
            [
                'icon' => 'cog-solid',
                'name' => 'Настройки сайта',
                'route' => '/front/pages/admin/settings',
            ],

        ]




    ],



];
