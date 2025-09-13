<?php

use App\Enums\UserRole;

return [

    'main' => [

        UserRole::User->value => [

            [
                'icon' => 'scroll-solid',
                'name' => 'Лента',
                'route' => 'pages.home' , //pages.feed
            ],
            [
                'icon' => 'fire-solid',
                'name' => 'Самое интересное',
                'route' => 'pages.home',
            ],
            [
                'icon' => 'clock-solid',
                'name' => 'Актуальные записи',
                'route' => 'pages.home',
            ],
            [
                'icon' => 'book-solid',
                'name' => 'Дневники',
                'route' => 'pages.home',
            ],
            [
                'icon' => 'handshake-solid',
                'name' => 'Купить лошадь',
                'route' => 'pages.home',
            ],
            [
                'icon' => 'horse-head-solid',
                'name' => 'Лошади',
                'route' => 'pages.horse.breed.all',
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

    'my' => [
        UserRole::User->value => [
            [
                'icon' => 'horse-head-solid',
                'name' => 'Мои лошади',
                'route' => 'pages.user.horses.my' , //pages.feed
            ],
            [
                'icon' => 'writing-solid',
                'name' => 'Мой блог',
                'route' => 'pages.home',
            ]
        ],
    ]

];
