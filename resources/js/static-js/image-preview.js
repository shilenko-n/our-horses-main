export default function () {
	document
		.querySelectorAll('.image-preview')
		.forEach(item => {
			item
				.querySelector('.js-image-preview-delete')
				.addEventListener('click', () => {
					const positioningBtn = item.querySelector('.js-image-preview-positioning')

					positioningBtn.disabled = !positioningBtn.disabled

					item.classList.toggle('image-preview_disabled')

					item
						.querySelector('.js-image-preview-delete')
						.classList.toggle('d-none')

					item
						.querySelector('.js-image-preview-restore')
						.classList.toggle('d-none')
				})

			item
				.querySelector('.js-image-preview-restore')
				.addEventListener('click', () => {
					const positioningBtn = item.querySelector('.js-image-preview-positioning')

					positioningBtn.disabled = !positioningBtn.disabled

					item.classList.toggle('image-preview_disabled')

					item
						.querySelector('.js-image-preview-delete')
						.classList.toggle('d-none')

					item
						.querySelector('.js-image-preview-restore')
						.classList.toggle('d-none')
				})
		})
}
