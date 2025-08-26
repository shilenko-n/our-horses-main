export default function () {
	const root = document.querySelector('.mobile-menu-item_multi')

	if (root) {
		root.addEventListener('click', () => {
			root.querySelector('.mobile-menu-item__menu')?.classList?.toggle('mobile-menu-item__menu_show')
		})
	}
}
