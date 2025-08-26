// Кнопка прокрутки наверх страницы

export default function () {
	const scrollTopButton = document.querySelector('.comments__up-button')
	const commentBlock = document.querySelector('.comments__content')

	if (!scrollTopButton || !commentBlock) return

	window.addEventListener('scroll', () => {
		if (
			document.body.scrollTop > (commentBlock.offsetTop + 100) ||
			document.documentElement.scrollTop > (commentBlock.offsetTop + 100)
		) {
			scrollTopButton.classList.add('comments__up-button_show')
		} else {
			scrollTopButton.classList.remove('comments__up-button_show')
		}
	})
}
