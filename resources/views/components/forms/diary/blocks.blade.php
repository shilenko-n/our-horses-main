<template x-for="(block, idx) in blocks" :key="idx">
    <div {{ $attributes->class(['diary-block']) }}>
        <div class="diary-block__actions">
            <div class="diary-block__actions_position">
                <x-button
                    color="pale"
                    size="small"
                    icon="chevron-up-solid"
                    x-bind:disabled="idx === 0"
                    x-on:click="moveUp(idx)"
                />
                <x-button
                    color="pale"
                    size="small"
                    icon="chevron-down-solid"
                    x-bind:disabled="idx === blocks.length - 1"
                    x-on:click="moveDown(idx)"
                />
            </div>
            <div class="diary-block__title" x-text="block.type"></div>
            <x-button color="pale" size="small" icon="times-light" />
        </div>
        <div class="diary-block__content">
            <template x-if="block.type == 'image'">
                <p>image</p>
            </template>
            <template x-if="block.type == 'video'">
                <p>video</p>
            </template>
            <template x-if="block.type == 'gallery'">
                <p>gallery</p>
            </template>
            <template x-if="block.type == 'text'">
                <div class="editor" x-data="editor(block.content)">
                    <div
                        class="editor__container article__content"
                        x-ref="editor"
                        x-on:input="setTextContent(idx, $refs.textarea.innerText)"></div>
                    <div class="editor__toolbar" x-ref="toolbar">
                        <span class="ql-formats">
                            <x-button class="ql-bold" color="pale" icon="bold" />
                            <x-button class="ql-italic" color="pale" icon="italic"></x-button>
                            <x-button class="ql-strike" color="pale" icon="strike"></x-button>
                            <x-button class="ql-link" color="pale" icon="link"></x-button>
                            <x-button class="ql-list" color="pale" icon="list" value="bullet"></x-button>
                            <div class="ql-header dropdown" x-data="dropdown">
                                <x-button class="dropdown__button" color="pale" icon="heading"></x-button>
                                <div class="dropdown__menu" x-show="opened">
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
                    <textarea class="editor__textarea" x-ref="textarea" rows="10"></textarea>
                </div>
            </template>
        </div>
    </div>
</template>



{{--<div class="diary-form__block">--}}
{{--    <div class="diary-form__block__controls">--}}
{{--        <div class="diary-form__block__controls-left">--}}
{{--            <x-button--}}
{{--                color="pale"--}}
{{--                x-bind:disabled="idx === 0"--}}
{{--                x-on:click="moveUp(idx)"--}}
{{--                icon="chevron-up-regular"--}}
{{--            />--}}
{{--            <x-button--}}
{{--                color="pale"--}}
{{--                x-bind:disabled="idx === blocks.length - 1"--}}
{{--                x-on:click="moveDown(idx)"--}}
{{--                icon="chevron-down-regular"--}}
{{--            />--}}

{{--            <p x-text="block.type" />--}}
{{--        </div>--}}
{{--        <div class="diary-form__block__controls-right">--}}
{{--            <x-button--}}
{{--                color="pale"--}}
{{--                icon="chevron-down-regular"--}}
{{--                x-on:click="deleteBlock(idx)"--}}
{{--            />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
