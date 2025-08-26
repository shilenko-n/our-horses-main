export default function () {
	document.querySelectorAll('.js-horse-tabs').forEach(tabs => {
		tabs.querySelectorAll('.tab').forEach(tab => {
			tab.addEventListener('click', event => {
				event.preventDefault()
				deselectAll(tabs)
				selectActiveTab(tabs, tab.getAttribute('href'))
			})
		})

		tabs
			.querySelector('select')
			.addEventListener('change', event => {
				const selectedId = event.target.value
				deselectAll(tabs)
				selectActiveTab(tabs, selectedId)
			})
	})
}

function deselectAll(tabs) {
	tabs.querySelector('select').value = ''

	tabs.querySelectorAll('.tab').forEach(tab => {
		tab.classList.remove('tab_selected')
		document.querySelector(tab.getAttribute('href')).classList.add('d-none')
	})
}

function selectActiveTab(tabs, selectedId) {
	document.querySelector(selectedId).classList.remove('d-none')
	tabs.querySelector('select').value = selectedId
	tabs.querySelector('.tab[href="' + selectedId + '"]').classList.add('tab_selected')
}
