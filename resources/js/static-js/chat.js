export default function () {
	let $button = document.querySelector('.js-open-sidebar');

	if($button) {
		$button.addEventListener('click', () => {
			let $sidebar = document.querySelector('.chat__sidebar');
			let $container = document.querySelector('.chat__container');

			$container.style.opacity = '0';
			$container.style.transition = 'opacity 0.5s';

			setTimeout(() => {
				$container.style.display = 'none';
				$sidebar.style.display = 'flex';
				$sidebar.style.opacity = '0';

				setTimeout(() => {
					$sidebar.style.opacity = '1';
					$sidebar.style.transition = 'opacity 0.5s';
				}, 50);
			}, 500);
		});

		document.querySelectorAll('.chat-user-card').forEach(userCard => {
			userCard.addEventListener('click', () => {
				if(window.innerWidth <= 1280) {
					let $sidebar = document.querySelector('.chat__sidebar');
					let $container = document.querySelector('.chat__container');

					$sidebar.style.opacity = '0';
					$sidebar.style.transition = 'opacity 0.5s';

					setTimeout(() => {
						$sidebar.style.display = 'none';
						$container.style.display = 'grid';
						$container.style.opacity = '0';

						setTimeout(() => {
							$container.style.opacity = '1';
							$container.style.transition = 'opacity 0.5s';
						}, 50);
					}, 500);
				}
			})
		})
	}
}
