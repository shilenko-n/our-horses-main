import baguetteBox from 'baguettebox.js'

export default function initGalleriesJs() {
	const htmlTag = document.documentElement
	// !! Галерея не включится если в ссылках будут изображения без расширения
	baguetteBox.run('.gallery_default', {
		overlayBackgroundColor: 'rgba(0, 0, 0, 0.5)',
		afterShow: () => { htmlTag.classList.add('no-scroll') },
		afterHide: () => { htmlTag.classList.remove('no-scroll') },
	})

	// Пример галереи с обработкой видео из youtube
	// const videoGallery = baguetteBox.run('.gallery_with-video', {
	// 	overlayBackgroundColor: 'rgba(0, 0, 0, 0.5)',
	// 	onChange: function (currentIndex, imagesCount) {
	// 		cleanIframes()
	// 		handleVideo(videoGallery, currentIndex)
	// 	},
	// 	afterShow: () => { htmlTag.classList.add('no-scroll') },
	// 	afterHide: function () {
	// 		cleanIframes()
	// 		htmlTag.classList.remove('no-scroll')
	// 	},
	// })
}

// function handleVideo(gallery, galleryCurrentIndex) {
// 	const currentImage = gallery[0][galleryCurrentIndex]
// 	const imageElement = currentImage ? currentImage.imageElement : null
// 	const videoEmbedId = imageElement ? imageElement.dataset.videoEmbedId : null
// 	const overlayImageElement = videoEmbedId ? document.querySelector('#baguetteBox-overlay #baguetteBox-figure-' + galleryCurrentIndex) : null

// 	if (videoEmbedId && overlayImageElement) {
// 		insertIframe(videoEmbedId, overlayImageElement)
// 	}
// }

// function insertIframe(videoId, element) {
// 	const iframe = document.createElement('iframe')

// 	iframe.src = 'https://www.youtube.com/embed/' + videoId + '?modestbranding=1&rel=0&autoplay=0'
// 	iframe.width = '100%'
// 	iframe.height = '100%'
// 	iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'
// 	iframe.setAttribute('frameborder', 0)
// 	iframe.setAttribute('allowfullscreen', true)

// 	element.prepend(iframe)
// }

// function cleanIframes(videoId, element) {
// 	const iframes = document.querySelectorAll('#baguetteBox-overlay iframe')

// 	iframes.forEach(iframe => {
// 		iframe.remove()
// 	})
// }
