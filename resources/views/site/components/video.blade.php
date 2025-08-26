<v-video :disable-wrapper-close="@json($disableWrapperClose)" v-cloak>
	<template #content="{ close }">
		{{ $slot }}
	</template>

	<template #button="{ open }">
		<div class="video">
			{{-- blade-formatter-disable --}}
				<x-picture class="post__content-image"
					:phone="$posterPhone"
					:tablet="$posterTablet"
					:laptop="$posterLaptop"
					:image="$poster"
				/>
			{{-- blade-formatter-enable --}}
			<div class="video__play" @click="open()"></div>
		</div>
	</template>
</v-video>
