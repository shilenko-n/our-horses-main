import Quill from 'quill'

export default function () {
	document.querySelectorAll('.editor').forEach(wrapper => {
		const $toolbar = wrapper.querySelector('.editor__toolbar')
		const $editor = wrapper.querySelector('.editor__container')
		const $textarea = wrapper.querySelector('.editor__textarea')

		const quill = new Quill($editor, {
			modules: {
				toolbar: $toolbar
			}
		})

		quill.on('text-change', (delta, oldDelta, source) => {
			$textarea.innerHTML = quill.getSemanticHTML()
		});

	})
}
