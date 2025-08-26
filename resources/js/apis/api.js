export default {
	request(url, data = {}) {
		const headers = {
			Accept: 'application/json',
		}

		const jsonHeaders = {
			'Content-Type': 'application/json',
		}

		if (!(data instanceof FormData)) {
			Object.assign(headers, jsonHeaders)
			data = JSON.stringify(data)
		}

		return fetch(url, {
			method: 'POST',
			body: data,
			headers,
			credentials: 'same-origin',
		})
			.then(response => {
				const responseStatus = {
					ok: response.ok,
					code: response.status,
					statusText: response.statusText,
				}

				return response.json()
					.then(response => ({
						responseStatus,
						responseData: response.data,
					}))
					.catch(() => ({
						responseStatus,
					}))
			})
			.then(({ responseStatus, responseData }) => {
				if (responseStatus.ok && !responseData?.errors) {
					return responseData
				}

				return Promise.reject({ responseStatus, responseData })
			})
			.catch(result => {
				// Обработка ошибки в JS
				if (result instanceof Error) {
					console.log(result.message) // eslint-disable-line no-console
				}

				// Обработка ошибки по статусу ответа
				// if (result.responseStatus?.code) { }

				// Обработка ошибки в ответе API
				// if (result.responseData?.errors) { }

				return Promise.reject(result.responseData || null)
			})
	},
}
