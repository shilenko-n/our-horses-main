<v-tabs v-slot="{ tabs, selectTab, selectedTab }">
	<div {{ $attributes->class([ 'tabs' ]) }}>
		<!-- Табы -->
		<div class="tabs__tabs" v-cloak>
			<!-- Таба -->
			<button
				v-for="(tab, index) in tabs"
				:key="index"
				type="button"
				class="tabs__tab"
				:class="{ 'tabs__tab_active': selectedTab === index }"
				@click.prevent="selectTab(index)"
			>
				<span>@{{ tab.name }}</span>
			</button>
		</div>

		<!-- Контент табы -->
		<div class="tabs__content">
			{{ $slot }}
		</div>
	</div>
</v-tabs>
