<x-diary-block title="Текст" :disable-up="$disableUp ?? false" :disable-down="$disableDown ?? false">
	<div class="editor">
		<div class="editor__container article__content">Лошади – это удивительно красивые животные. Их силе и грации могут позавидовать многие представители животного мира. Не удивительно, почему их так любят многие люди. Более того, именно эти животные вместе с человеком творили историю. Однако, что мы знаем интересного об этих животных? Практически в каждой развитой стране есть отдельный отряд полиции на лошадях – конная полиция. Это очень удобно и маневренно в тех местах, куда машина или мотоцикл не может проехать. Например, такие патрули всегда охраняют порядок в парках и зонах отдыха, на городских улицах и загруженных транспортом проспектах. Первые полицейские лошади появились еще в XVII веке, а первая конная полиция организована в 1805 году. Сначала она существовала лишь в Англии, а затем опыт переняла Америка и Австралия, Россия.</div>
		<div class="editor__toolbar">
			<span class="ql-formats">
				<x-button class="ql-bold" color="pale" icon="bold" />
				<x-button class="ql-italic" color="pale" icon="italic"></x-button>
				<x-button class="ql-strike" color="pale" icon="strike"></x-button>
				<x-button class="ql-link" color="pale" icon="link"></x-button>
				<x-button class="ql-list" color="pale" icon="list" value="bullet"></x-button>
				<div class="ql-header dropdown">
					<x-button class="dropdown__button" color="pale" icon="heading"></x-button>
					<div class="dropdown__menu">
						<button class="dropdown__item ql-header font-bold" type="button" value="1">H1</button>
						<button class="dropdown__item ql-header font-bold" type="button" value="2">H2</button>
						<button class="dropdown__item ql-header font-bold" type="button" value="3">H3</button>
					</div>
				</div>
			</span>
			<div class="ql-formats">
				<x-button color="pale" icon="at-user" />
				<x-button color="pale" icon="at-horse" />
			</div>
		</div>
		<textarea class="editor__textarea" rows="10">Лошади – это удивительно красивые животные. Их силе и грации могут позавидовать многие представители животного мира. Не удивительно, почему их так любят многие люди. Более того, именно эти животные вместе с человеком творили историю. Однако, что мы знаем интересного об этих животных? Практически в каждой развитой стране есть отдельный отряд полиции на лошадях – конная полиция. Это очень удобно и маневренно в тех местах, куда машина или мотоцикл не может проехать. Например, такие патрули всегда охраняют порядок в парках и зонах отдыха, на городских улицах и загруженных транспортом проспектах. Первые полицейские лошади появились еще в XVII веке, а первая конная полиция организована в 1805 году. Сначала она существовала лишь в Англии, а затем опыт переняла Америка и Австралия, Россия.</textarea>
	</div>
</x-diary-block>
