export default function () {
	document.querySelectorAll('.comment').forEach(comment => {
		const button = comment.querySelector('[data-answer-button]')

		button.addEventListener('click', () => {
			const form = comment.querySelector('.comment__answer-form')

			form.classList.toggle('comment__answer-form_show')

			if (form.classList.contains('comment__answer-form_show')) {
				button.textContent = 'Отменить'
			} else {
				button.textContent = 'Ответить'
				form.querySelector('textarea').value = ''
			}
		})
	})
}
