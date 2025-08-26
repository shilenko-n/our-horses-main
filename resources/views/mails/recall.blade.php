<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Обратный звонок</title>
</head>
<body>
	<h4>Заказ звонка</h4>
	<p><strong>Телефон:</strong> {{ $phone }}</p>

	@if (isset($block))
		<p><strong>Страница:</strong> {{ $block->menuItem->name }}</p>
		<p><strong>Тип обращения:</strong> {{ config('notices.types.' . $block->type) }}</p>
	@endif
</body>
</html>
