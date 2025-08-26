export default function () {
	document.querySelectorAll('.owners').forEach(comment => {
		const button = comment.querySelector('[data-owners-toggle]')

		button.addEventListener('click', () => {
			const block = comment.querySelector('.owners__previous')

			block.classList.toggle('owners__previous_show')
			button.querySelector('.icon').classList.toggle('rotate-180')

			if (block.classList.contains('owners__previous_show')) {
				button.querySelector('span').textContent = 'Скрыть предыдущих владельцев'
			} else {
				button.querySelector('span').textContent = 'Показать предыдущих владельцев'
			}
		})
	})
}
