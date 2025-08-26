export default function initYaMetrikaGoalsJs() {
	if (window.ym && window.yaid) {
		const counterId = window.yaid

		document.querySelectorAll('[data-ym-goal]').forEach(item => {
			const goal = item.dataset.ymGoal

			if (goal && goal.length) {
				item.addEventListener('click', () => {
					window.ym(counterId, 'reachGoal', goal)
				})
			}
		})
	}
}
