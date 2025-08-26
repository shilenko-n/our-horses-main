export default function () {
	const prevHorsesButton = document.querySelector('.prev-horses__button')
	const prevHorsesBlock = document.querySelector('.prev-horses__block')

	if (prevHorsesButton && prevHorsesBlock) {
		prevHorsesButton.addEventListener('click', () => {
			prevHorsesBlock.classList.toggle('prev-horses__block_visible')
			prevHorsesButton.querySelector('.icon').classList.toggle('icon-chevron-down-solid')
			prevHorsesButton.querySelector('.icon').classList.toggle('icon-chevron-up-solid')

			if (prevHorsesBlock.classList.contains('prev-horses__block_visible')) {
				prevHorsesButton.querySelector('span').innerHTML = 'Скрыть прежних лошадей'
			} else {
				prevHorsesButton.querySelector('span').innerHTML = 'Показать прежних лошадей'
			}
		})
	}
}
