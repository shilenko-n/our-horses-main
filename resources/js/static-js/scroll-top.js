// Кнопка прокрутки наверх страницы

export default function initScrollTopJs() {
	const scrollTopButton = document.querySelector('.scroll-top')

	if (!scrollTopButton) return

	window.onscroll = () => scrollFunction()
	scrollTopButton.onclick = () => topFunction()

	function scrollFunction() {
		if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
			scrollTopButton.classList.add('scroll-top_visible')
		} else {
			scrollTopButton.classList.remove('scroll-top_visible')
		}
	}

	function topFunction() {
		window.scrollTo(0, 0)
	}
}
