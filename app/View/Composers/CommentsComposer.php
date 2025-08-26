<?php

namespace App\View\Composers;

use Illuminate\View\View;

class CommentsComposer
{
	public function compose(View $view)
	{
		$comments = [
			[
				'author' => fake()->human(1),
				'comment' => 'Таки! Поздравляю!',
				'is_self' => false,
				'is_team' => false,
				'reply_name' => null,
				'sub_comments' => [
					[
						'author' => fake()->human(0),
						'comment' => 'Спасибо!',
						'is_self' => true,
						'is_team' => false,
						'reply_name' => null,
						'sub_comments' => [],
						'image' => '',
					],
					[
						'author' => fake()->human(2),
						'comment' => 'Видел тебя на выставке',
						'is_self' => false,
						'is_team' => true,
						'reply_name' => explode(' ', fake()->human(0)['name'])[0],
						'sub_comments' => [],
						'image' => '',
					],
				],
				'image' => '',
			],
			[
				'author' => fake()->human(3),
				'comment' => 'Комментарий был удалён',
				'is_self' => false,
				'is_team' => false,
				'reply_name' => null,
				'sub_comments' => [
					[
						'author' => fake()->human(0),
						'comment' => 'А вот на этой мило)',
						'is_self' => true,
						'is_team' => false,
						'reply_name' => null,
						'sub_comments' => [],
						'image' => asset('img/assets/horses/l/03.jpeg'),
					],
				],
				'image' => '',
			],
		];

		$view->with('comments', $comments);
	}
}
