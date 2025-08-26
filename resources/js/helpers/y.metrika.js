export default {
	reachGoal(goalName) {
		if (goalName && window.yaid && window.ym) {
			window.ym(window.yaid, 'reachGoal', goalName)
		}
	},
}
