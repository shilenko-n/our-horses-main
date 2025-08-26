<?php

namespace App\Services\Fakers;

use Faker\Provider\Base;

class SearchResult extends Base
{
	protected $people = [
		[
			'id' => 1,
			'name' => 'Василий Лошадев',
			'age' => '29 лет',
			'location' => 'Россия, Москва',
			'status' => 'Пользователь',
			'photo' => '/img/assets/search/01.jpg'
		],
		[
			'id' => 2,
			'name' => 'Анна Конюхова',
			'age' => '35 лет',
			'location' => 'Россия, Санкт-Петербург',
			'status' => 'Пользователь',
			'photo' => '/img/assets/people/05.jpeg'
		],
	];

	protected $horses = [
		[
			'id' => 1,
			'name' => 'Милано',
			'user' => 'Контур',
			'breed' => 'Будёновская лошадь',
			'status' => 'Лошадь',
			'photo' => '/img/assets/search/02.jpg',
		],
		[
			'id' => 2,
			'name' => 'Камила',
			'user' => 'Контур',
			'breed' => 'Ахелтинская лошадь',
			'location' => 'Россия, Санкт-Петербург',
			'status' => 'Объявление о продаже/аренде',
			'price' => '500 000 ₽',
			'photo' => '/img/assets/search/03.jpg',
		],
	];

	protected $blog = [
		[
			'id' => 1,
			'header' => 'Как правильно запрячь лошадь',
			'description' => 'Аккуратно разместите седло на спине у лошади. Оно должно находиться по середине потника. Еще раз проверьте, чтобы оно не мешало плечам лошади. Если седло размещено правильно, то прямо перед седлом на потнике будет тоненькая полоска, она будет выходить прямо из-под низа лука седла. Если вы используете мартингал, то прикрепите его до того, как положить седло. Также обратите ваше внимание на то, что конец потника нужно размещать на луке седла. Так легче всего поднять седло с потником так, чтобы аккуратно положить его в нескольких сантиметрах от гривы.',
			'status' => 'Личный блог',
			'publication-date' => '12 минут назад',
			'photo' => '/img/assets/search/04.jpg'
		],
	];

	protected $diary = [
		[
			'id' => 1,
			'header' => 'Размышления о лошадках',
			'description' => 'Лошади – это удивительно красивые животные. Их силе и грации могут позавидовать многие представители животного мира. Не удивительно, почему их так любят многие люди. Более того, именно эти животные вместе с человеком творили историю. Однако, что мы знаем интересного об этих животных? Практически в каждой развитой стране есть отдельный отряд полиции на лошадях – конная полиция. Это очень удобно и маневренно в тех местах, куда...',
			'status' => 'Дневник лошади',
			'publication-date' => '17 сентября 2022 19:27',
			'photo' => '/img/assets/search/05.jpg'
		],
	];

	public function searchResult()
	{
		$types = ['people', 'horses', 'blog', 'diary'];
		$type = $this->randomElement($types);

		return $this->{$type}();
	}

	public function people()
	{
		return $this->randomElement($this->people);
	}

	public function horses()
	{
		return $this->randomElement($this->horses);
	}

	public function blog()
	{
		return $this->randomElement($this->blog);
	}

	public function diary()
	{
		return $this->randomElement($this->diary);
	}
}
