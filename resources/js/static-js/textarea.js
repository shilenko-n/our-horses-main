export default function initTextareaJs() {
	// Автоматическая высота textarea в зависимости от введенного текста
	const textarea = document.querySelectorAll("textarea");
	textarea.forEach(item => {
		item.setAttribute("style", "height:" + (item.scrollHeight) + "px;overflow-y:hidden;");
		item.oninput = () => {
			item.style.height = "auto";
			item.style.height = (item.scrollHeight) + "px";
		};
	})
}
