import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

export default function initSlidersJs() {
	initSlider('.swiper-slider .swiper', defaultSliderOptions)
}

const defaultSliderOptions = {
	modules: [Navigation, Pagination],
	loop: true,
	slidesPerView: 1,
	// autoHeight: true,

	// Пагинация
	pagination: {
		enabled: true,
		el: '.swiper-pagination',
		clickable: true,
		type: 'fraction', // Нумерация
	},

	// Стрелки
	navigation: {
		enabled: true,
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
}

function initSlider(selector, options) {
	const sliders = []
	const slidersEls = document.querySelectorAll(selector)

	slidersEls.forEach((el, index) => {
		const slides = el.querySelectorAll('.swiper-slide')

		// Если у слайдера 1 слайд. то не инициализируем
		if (slides.length > 1) {
			sliders[index] = new Swiper(el, options)
		}
	})

	return sliders
}
