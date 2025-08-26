{{-- DEPRECATED проверить и переделать на универсальный компонент --}}
<div class="feed-actions">
	{{-- Сортировка --}}
	@if ($isAdmin)
		<x-forms.select>
			<option>Сначала новые</option>
			<option>Сначала старые</option>
		</x-forms.select>
	@endif

	{{-- Блок фильтра --}}
	@if (!$onlyFilter)
		<x-forms.select class="d-none-d">
			@if($list)
				@foreach($list as $item)
					<option value="">{{ $item }}</option>
				@endforeach
			@else
				<option>Все записи</option>
				<option>Дневники лошадей</option>
				<option>Личные блоги</option>
			@endif
		</x-forms.select>
	@endif

	{{-- Кнопка показа фильтра в мобильной версии --}}
	@if ($isAdmin || $onlyFilter)
		<x-button class="d-none-d"
				  color="white"
				  bordered
				  icon="filter-solid"
				  @click="openModal('{{ $modalName }}')"
		>Открыть фильтры</x-button>
	@endif
</div>
