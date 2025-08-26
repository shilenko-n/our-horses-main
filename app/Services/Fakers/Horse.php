<?php

namespace App\Services\Fakers;

use Faker\Provider\Base;

class Horse extends Base
{
	protected $horses =  [
		[
			'id' => 1,
			'name' => 'Батезу',
			'records' => '1001',
			'mentions' => '12',
			'subscribers' => '30',
			'user' => 'Анжела Романова',
			'location' => 'Новосибирск',
			'breed' => 'Абиссинская',
			'slider' => [1, 2, 3, 4],
		],
		[
			'id' => 2,
			'name' => 'Гриффит',
			'records' => '202',
			'mentions' => '104',
			'subscribers' => '11',
			'user' => 'Пётр Петров',
			'location' => 'Гатчина',
			'breed' => 'Булонская',
			'slider' => [2, 3, 4, 5],
		],
		[
			'id' => 3,
			'name' => 'Дриада',
			'records' => '284',
			'mentions' => '104',
			'subscribers' => '52',
			'user' => 'Алексей Усов',
			'location' => 'Санкт-Петербург',
			'breed' => 'Кигерский мустанг',
			'slider' => [3, 4, 5, 6],
		],
		[
			'id' => 4,
			'name' => 'Хесана',
			'records' => '479',
			'mentions' => '28',
			'subscribers' => '71',
			'user' => 'Анна Горина',
			'location' => 'Санкт-Петербург',
			'breed' => 'Орловский рысак',
			'slider' => [4, 5, 6, 7],
		],
		[
			'id' => 5,
			'name' => 'Изольда',
			'records' => '936',
			'mentions' => '7',
			'subscribers' => '34',
			'user' => 'Иван Иванов',
			'location' => 'Санкт-Петербург',
			'breed' => 'Русский рысак',
			'slider' => [5, 6, 7, 8],
		],
		[
			'id' => 6,
			'name' => 'Замбези',
			'records' => '400',
			'mentions' => '32',
			'subscribers' => '19',
			'user' => 'Елена Кулагина',
			'location' => 'Москва',
			'breed' => 'Меренская',
			'slider' => [6, 7, 8, 1],
		],
		[
			'id' => 7,
			'name' => 'Баал',
			'records' => '1001',
			'mentions' => '12',
			'subscribers' => '22',
			'user' => 'Елена Кулагина',
			'location' => 'Москва',
			'breed' => 'Пампийская',
			'slider' => [7, 8, 1, 2],
		],
		[
			'id' => 8,
			'name' => 'Крити',
			'records' => '563',
			'mentions' => '274',
			'subscribers' => '84',
			'user' => 'Елена Кулагина',
			'location' => 'Москва',
			'breed' => 'Татарская',
			'slider' => [8, 1, 2, 3],
		],
	];

	public function horse(int $id = null)
	{
		$result = $this->randomElement($this->horses);

		if (!is_null($id)) {
			$id = $id % count($this->horses) + 1;
			$result = $this->horses[$id - 1];
		}

		$result['photo'] = [
			'p' => asset('img/assets/horses/p/' . str_pad($result['id'], 2, '0', STR_PAD_LEFT) . '.jpeg'),
			't' => asset('img/assets/horses/t/' . str_pad($result['id'], 2, '0', STR_PAD_LEFT) . '.jpeg'),
			'l' => asset('img/assets/horses/l/' . str_pad($result['id'], 2, '0', STR_PAD_LEFT) . '.jpeg'),
			'd' => asset('img/assets/horses/d/' . str_pad($result['id'], 2, '0', STR_PAD_LEFT) . '.jpeg'),
		];

		$result['slider'] = [
			[
				'p' => asset('img/assets/horse-slider/p/' . str_pad($result['slider'][0], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				't' => asset('img/assets/horse-slider/t/' . str_pad($result['slider'][0], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				'l' => asset('img/assets/horse-slider/l/' . str_pad($result['slider'][0], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				'd' => asset('img/assets/horse-slider/d/' . str_pad($result['slider'][0], 2, '0', STR_PAD_LEFT) . '.jpeg'),
			],
			[
				'p' => asset('img/assets/horse-slider/p/' . str_pad($result['slider'][1], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				't' => asset('img/assets/horse-slider/t/' . str_pad($result['slider'][1], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				'l' => asset('img/assets/horse-slider/l/' . str_pad($result['slider'][1], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				'd' => asset('img/assets/horse-slider/d/' . str_pad($result['slider'][1], 2, '0', STR_PAD_LEFT) . '.jpeg'),
			],
			[
				'p' => asset('img/assets/horse-slider/p/' . str_pad($result['slider'][2], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				't' => asset('img/assets/horse-slider/t/' . str_pad($result['slider'][2], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				'l' => asset('img/assets/horse-slider/l/' . str_pad($result['slider'][2], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				'd' => asset('img/assets/horse-slider/d/' . str_pad($result['slider'][2], 2, '0', STR_PAD_LEFT) . '.jpeg'),
			],
			[
				'p' => asset('img/assets/horse-slider/p/' . str_pad($result['slider'][3], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				't' => asset('img/assets/horse-slider/t/' . str_pad($result['slider'][3], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				'l' => asset('img/assets/horse-slider/l/' . str_pad($result['slider'][3], 2, '0', STR_PAD_LEFT) . '.jpeg'),
				'd' => asset('img/assets/horse-slider/d/' . str_pad($result['slider'][3], 2, '0', STR_PAD_LEFT) . '.jpeg'),
			],
		];

		return $result;
	}
}
