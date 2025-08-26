export default function () {
	document.querySelectorAll('.add-post-block')?.forEach(block => {
		block
			.querySelector('.add-post-block__button')
			.addEventListener('click', () => {
				block
					.querySelector('.add-post-block__options')
					.classList
					.toggle('add-post-block__options_show')
			})
	})

	document.addEventListener('click', event => {
		if (
			!event.target.closest('.add-post-block') &&
			!event.target.closest('.add-post-block__options')
		) {
			document.querySelectorAll('.add-post-block')?.forEach(block => {
				block
					.querySelector('.add-post-block__options')
					.classList
					.remove('add-post-block__options_show')
			})
		}
	})
}
