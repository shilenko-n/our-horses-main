<?php

namespace App\Services\Fakers;

use Faker\Provider\Base;

class Human extends Base
{
	protected $people =  [
		[
			'id' => 1,
			'name' => 'Василий Мерицкий',
			'age' => '42 года',
			'location' => 'Россия, Москва',
		],
		[
			'id' => 2,
			'name' => 'Константин Контантинопольский',
			'age' => '25 лет',
			'location' => 'Россия, Тольятти',
		],
		[
			'id' => 3,
			'name' => 'Кирилл Александров ',
			'age' => '56 лет',
			'location' => 'Россия, Москва',
		],
		[
			'id' => 4,
			'name' => 'Роман Романов',
			'age' => '21 год',
			'location' => 'Россия, Выборг',
		],
		[
			'id' => 5,
			'name' => 'Мария Маринова ',
			'age' => '32 года',
			'location' => 'Россия, Самара',
		],
		[
			'id' => 6,
			'name' => 'Кирилл Родионов',
			'age' => '28 лет',
			'location' => 'Россия, Санкт-Петербург',
		],
		[
			'id' => 7,
			'name' => 'Анастасия Вердеревская',
			'age' => '60 лет',
			'location' => 'Россия, Владивосток',
		],
		[
			'id' => 8,
			'name' => 'Пётр Петров',
			'age' => '44 года',
			'location' => 'Россия, Санкт-Петербург',
		],
		[
			'id' => 9,
			'name' => 'Алексей Усов',
			'age' => '30 лет',
			'location' => 'Россия, Гатчина',
		],
		[
			'id' => 10,
			'name' => 'Павел Тручелов',
			'age' => '39 лет',
			'location' => 'Россия, Ессентуки',
		],
		[
			'id' => 11,
			'name' => 'Анна Горина',
			'age' => '39 лет',
			'location' => 'Россия, Новосибирск',
		],
		[
			'id' => 12,
			'name' => 'Анжела Романова',
			'age' => '23 года',
			'location' => 'Россия, Санкт-Петербург',
		],
	];

	public function human(int $id = null)
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
		return $this->human($id)['photo'];
	}
}
