<div>
	<div class="comment">
		<div class="comment__comment">
			<div class="comment__author">
				<img class="comment__avatar" src="{{ $comment['author']['photo'] }}" alt="">
				<div class="comment__author-info">
					<div class="comment__author-name">
						<div class="comment__username">{{ $comment['author']['name'] }}</div>

						@if ($comment['is_self'] ?? false)
							<div class="comment__role">Автор</div>
						@elseif ($comment['is_team'] ?? false)
							<div class="comment__role">Команда «Наши Кони»</div>
						@endif

						@if ($comment['reply_name'] ?? false)
							<div class="comment__reply">пользователю {{ $comment['reply_name'] }}</div>
						@endif
					</div>
					<div class="comment__location">{{ $comment['author']['location'] }}</div>
				</div>
			</div>

			<div class="comment__content">
				{{ $comment['comment'] }}
				@if ($comment['image'] ?? false)
					<img class="comment__image" src="{{ $comment['image'] }}" alt="">
				@endif
			</div>

			<div class="comment__actions">
				<div class="comment__action">
					<x-post-button :active="fake()->boolean(20)" icon="heart-solid">{{ fake()->numberBetween(0, 100) }}</x-post-button>
					<x-post-button icon="bookmark-solid">{{ fake()->numberBetween(0, 30) }}</x-post-button>
					<div class="comment__ago">{{ now()->setTimestamp(fake()->dateTimeThisYear()->getTimestamp())->locale('ru_RU')->diffForHumans() }}</div>
					<x-link data-answer-button size="responsive">Ответить</x-link>
				</div>
				@if (session('auth'))
					<div class="comment__more">
						<div class="dropdown">
							<x-button class="dropdown__button" narrow color="transparent" icon="ellipsis-h-solid" />
							<div class="dropdown__menu">
								@if ($comment['is_self'] ?? false)
									<a class="dropdown__item" href="#">Редактировать</a>
									<a class="dropdown__item" href="#">Удалить</a>
								@else
									<a class="dropdown__item" href="#">Пожаловаться</a>
								@endif
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
		<div class="comment__answer-form">
			<x-comment.form />
		</div>
	</div>
	@if (count($comment['sub_comments'] ?? []))
		<div class="comment__subcomments">
			@foreach ($comment['sub_comments'] as $sub_comment)
				<x-comment.comment :comment="$sub_comment" />
			@endforeach
		</div>
	@endif
</div>
