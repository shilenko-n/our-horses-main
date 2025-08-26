<div class="horse__card">
	<div class="horse__card-image">
		<picture>
			<source media="(max-width: 360px)" srcset="https://placehold.co/492x276" />
			<source media="(max-width: 768px)" srcset="https://placehold.co/474x264" />
			<source media="(max-width: 1366px)" srcset="https://placehold.co/431x252" />
			<img src="https://placehold.co/549x312" />
		</picture>
		@if (isset($price))
			<div class="horse__card-price">{{ format_price($price) }}</div>
		@endif
	</div>
	<div class="horse__card-content">
		<div class="horse__card-horse">
			<div class="horse__card-horse-name">Батезу</div>

			<div class="horse__card-badges">
				<div class="horse__card-badge">{{ fake()->numberBetween(100, 2000) }}</div>
				<div class="horse__card-badge">{{ fake()->numberBetween(100, 2000) }}</div>
			</div>
		</div>
		<div class="horse__card-user">
			<div class="horse__card-user-name">Анжела Романова</div>
			<div class="horse__card-user-location">Новосибирск</div>
		</div>
	</div>
</div>
