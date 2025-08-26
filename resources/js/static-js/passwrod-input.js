export default function initPasswordInput() {
	document
		.querySelectorAll('.js-password-input')
		.forEach(inputBlock => {
			const input = inputBlock.querySelector('input')
			const icon = inputBlock.querySelector('.icon')

			icon.addEventListener('click', () => {
				if (input.type === 'password') {
					input.type = 'text'
					icon.classList.add('icon-eye-solid')
					icon.classList.remove('icon-eye-slash-solid')
				} else {
					input.type = 'password'
					icon.classList.remove('icon-eye-solid')
					icon.classList.add('icon-eye-slash-solid')
				}
			})
		})
}
