<a class="search-card" href="/">
	<!-- Отображение изображения -->
	@if(isset($data['photo']))
		<img class="search-card__img" src="{{ asset($data['photo']) }}" alt="">
	@endif

	<span class="search-card__container">
        <!-- Отображение данных для пользователя -->
        @if(isset($data['status']) && $data['status'] === 'Пользователь')
			<span class="search-card__name">{{ $data['name'] }}</span>
			<span class="expandable">
				<span class="search-card__age">{{ $data['age'] }}</span>
				<span class="search-card__location">{{ $data['location'] }}</span>
			</span>
			<span class="search-card__status">{{ $data['status'] }}</span>

			<!-- Отображение данных для лошади -->
		@elseif(isset($data['status']) && in_array($data['status'], ['Лошадь', 'Объявление о продаже/аренде']))
			@if(isset($data['price']))
				<span class="search-card__header">
					<span class="search-card__name">{{ $data['name'] }}</span>
					<span class="search-card__price">{{ $data['price'] }}</span>
				</span>
			@else
				<span class="search-card__name">{{ $data['name'] }}</span>
			@endif
			<span class="expandable">
				<span class="search-card__breed">{{ $data['breed'] }}</span>
				<span class="search-card__owner">{{ $data['user'] }}</span>
				@if(isset($data['location']))
					<span class="search-card__location">{{ $data['location'] }}</span>
				@endif
			</span>
			<span class="search-card__status">{{ $data['status'] }}</span>

			<!-- Отображение данных для поста (блог или дневник) -->
		@elseif(isset($data['status']) && in_array($data['status'], ['Личный блог', 'Дневник лошади']))
			<span class="search-card__header">{{ $data['header'] }}</span>
			<span class="expandable">
				<span class="search-card__description">{{ $data['description'] }}</span>
			</span>
			<span class="search-card__footer">
				<span class="search-card__status">{{ $data['status'] }}</span>
				<span class="search-card__publication-date">{{ $data['publication-date'] }}</span>
			</span>
		@endif
    </span>
</a>
