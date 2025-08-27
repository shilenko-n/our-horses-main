// Кнопка прокрутки наверх страницы

export default function initDropdownJs() {
	const dropdown = document.querySelectorAll('.dropdown')
	dropdown.forEach((dropdown) => {
		const dropdownMenu = dropdown.querySelector('.dropdown__menu')

		dropdown.querySelector('.dropdown__button').addEventListener('click', () => {
			dropdownMenu.classList.toggle('dropdown__menu_opened')
		})

		dropdown.querySelectorAll('.dropdown__item').forEach((item) => {
			item.addEventListener('click', () => {
				dropdownMenu.classList.remove('dropdown__menu_opened')
			})
		})

		dropdownMenu.addEventListener('blur', () => {
			dropdownMenu.classList.remove('dropdown__menu_opened')
		})
	})

	document.querySelector('body').addEventListener('click', event => {
		if (!event.target.closest('.dropdown')) {
			document.querySelectorAll('.dropdown__menu').forEach(menu => {
				menu.classList.remove('dropdown__menu_opened')
			})
		}
	})
}
