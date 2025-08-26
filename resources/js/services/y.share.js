export { initYaShare }

function initYaShare(url = document.location.origin, title = document.title) {
    const element = document.querySelector('.ya-share2');

    const share = Ya.share2(element, {
        content: {
            url,
            title
        }
        // здесь вы можете указать и другие параметры
    });
}
