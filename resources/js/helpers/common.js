/**
 * Выбирает слово из массива titles в зависимости от числа number. Работает как trans_choice в laravel.
 * Пример: 1 товар, 2 товара, 10 товаров
 *
 */
export function numToWord(number, titles) {
	const cases = [2, 0, 1, 1, 1, 2]
	const text = titles[number % 100 > 4 && number % 100 < 20 ? 2 : cases[number % 10 < 5 ? number % 10 : 5]]
	return number + ' ' + text
}

/**
 * Форматирует цену в рублях
 *
 */
export function formatPrice(value) {
	return Intl.NumberFormat(
		'ru-RU',
		{
			style: 'currency',
			currency: 'RUB',
			currencyDisplay: 'symbol',
			minimumFractionDigits: 0,
		},
	).format(value)
}
