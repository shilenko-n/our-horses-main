export default function initVideos() {
	// <div class="video">
	// 	<video poster="{{ asset('video/about-us.jpg') }}" volume="0.5" preload="metadata">
	// 		<source src="{{ asset('video/about-us.mp4') }}" type="video/mp4">
	// 	</video>
	// 	<div class="video__play"></div>
	// </div>

	const videos = document.querySelectorAll('.video video')

	videos.forEach(video => {
		const playbutton = video.parentNode.querySelector('.video__play')

		if (playbutton) {
			playbutton.addEventListener('click', () => {
				video.play()
				video.classList.add('playing')
				video.setAttribute('controls', true)
			})

			video.addEventListener('pause', () => {
				video.removeAttribute('controls')
				video.classList.remove('playing')
			})

			video.addEventListener('ended', () => {
				video.removeAttribute('controls')
				video.classList.remove('playing')
			})
		}
	})
}
