<div class="modal {{ $class }}" style="{{ $showModal ? 'display: block;' : 'display: none;' }}">
	<div class="modal-mask">
		<div class="modal-wrapper">
			<div class="modal-container">
				<!-- Заголовок -->
				<div class="modal-header">
					<h3>{{ $title }}</h3>
				</div>
				<!-- Контент -->
				<div class="modal-body">
					{!! $content !!}
				</div>
				<!-- Подвал -->
				<div class="modal-footer">
					{!! $footer !!}
				</div>
				<span class="modal-close" wire:click="closeModal"></span>
			</div>
		</div>
	</div>
</div>
