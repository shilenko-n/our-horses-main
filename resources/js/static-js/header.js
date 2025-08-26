export default function initHeaderJs() {
	const header = document.querySelector('.header')

	if (header) {
		// Помещаем обложку под шапку. Закоментить, если не нужно
		setCoverIdent(header)

		// Устанавливаем класс шапки при скроле страницы
		setScrolledStyles(header)
	}
}

function setScrolledStyles(header) {
	window.addEventListener('load', bgHeader)
	window.addEventListener('scroll', bgHeader)

	function bgHeader() {
		const scroll = window.scrollY
		header.classList.toggle('header_scrolled', scroll > 10)
	}
}

function setCoverIdent(header) {
	new ResizeObserver((entries) => {
		const cover = document.querySelector('.layout__main > .cover:first-child')

		if (cover) {
			const entryHeight = entries[0].target.offsetHeight
			cover.style.marginTop = (entryHeight * -1) + 'px'
		}
	}).observe(header, { box: 'border-box' })
}
