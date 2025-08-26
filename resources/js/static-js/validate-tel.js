import Cleave from 'cleave.js'
import 'cleave.js/dist/addons/cleave-phone.ru'

export default function initValidateTelJs() {
	const inputs = document.querySelectorAll('input[type="tel"]')
	inputs.forEach((el) => {
		const validation = new Cleave(el, { // eslint-disable-line
			phone: true,
			phoneRegionCode: 'ru',
		})
	})
}
