<?php

namespace App\Services\Fakers;

use Faker\Provider\Base;

class ChatUser extends Base
{
	protected $people =  [
		[
			'id' => 1,
			'name' => 'Василий Мерицкий',
			'last-message' => 'Впервые за 15 лет, сколько я мониторю этот рынок, в продаже их такое количество',
			'date-message' => 'Час назад',
			'notification-counter' => null,
		],
		[
			'id' => 2,
			'name' => 'Константин Контантинопольский',
			'last-message' => 'Покупаю!',
			'date-message' => 'Вчера в 10:15',
			'notification-counter' => 2,
		],
		[
			'id' => 3,
			'name' => 'Кирилл Александров ',
			'last-message' => 'По поводу объявления о продаже лошади. Оно еще в силе?',
			'date-message' => '11 ноября в 18:10',
			'notification-counter' => null,
		],
		[
			'id' => 4,
			'name' => 'Роман Романов',
			'last-message' => 'Привет! Очень понравился твой пост!',
			'date-message' => '11 ноября в 11:56',
			'notification-counter' => 1,
		],
		[
			'id' => 5,
			'name' => 'Мария Маринова',
			'last-message' => 'Как дела?)',
			'date-message' => '9 ноября в 20:30',
			'notification-counter' => null,
		],
		[
			'id' => 6,
			'name' => 'Кирилл Родионов',
			'last-message' => 'Искала объявления о продаже вороной лошади, увидела вашу лошадку и поняла, что это то, что',
			'date-message' => '7 ноября в 16:23',
			'notification-counter' => 4,
		],
		[
			'id' => 7,
			'name' => 'Анастасия Вердеревская',
			'last-message' => 'Впервые за 15 лет, сколько я мониторю этот рынок, в продаже их такое количество',
			'date-message' => 'Час назад',
			'notification-counter' => null,
		],
		[
			'id' => 8,
			'name' => 'Пётр Петров',
			'last-message' => 'Покупаю!',
			'date-message' => 'Вчера в 10:15',
			'notification-counter' => null,
		],
		[
			'id' => 9,
			'name' => 'Алексей Усов',
			'last-message' => 'По поводу объявления о продаже лошади. Оно еще в силе?',
			'date-message' => '11 ноября в 18:10',
			'notification-counter' => null,
		],
		[
			'id' => 10,
			'name' => 'Павел Тручелов',
			'last-message' => 'Как дела?)',
			'date-message' => '9 ноября в 20:30',
			'notification-counter' => null,
		],
		[
			'id' => 11,
			'name' => 'Анна Горина',
			'last-message' => 'Искала объявления о продаже вороной лошади, увидела вашу лошадку и поняла, что это то, что',
			'date-message' => '7 ноября в 16:23',
			'notification-counter' => null,
		],
		[
			'id' => 12,
			'name' => 'Анжела Романова',
			'last-message' => 'Увидела вашу лошадку и поняла, что это то, что мне нужно.',
			'date-message' => '11 ноября в 11:11',
			'notification-counter' => null,
		],
	];

	public function chatUser(int $id = null)
	{
		$result = $this->randomElement($this->people);

		if (!is_null($id)) {
			$result = $this->people[($id % count($this->people))];
		}

		$result['photo'] = asset('img/assets/people/' . str_pad($result['id'], 2, '0', STR_PAD_LEFT) . '.jpeg');

		return $result;
	}

	public function avatar(int $id = null)
	{
		return $this->chatUser($id)['photo'];
	}
}
