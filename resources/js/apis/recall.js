import api from './api'

export default {
	submitRecall(form) {
		return api.request('api/recall', form)
	},
}
