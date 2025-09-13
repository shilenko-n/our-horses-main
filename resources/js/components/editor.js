
import Quill from "quill";

Alpine.data('editor', (content = '') => ({

    content: content,

    init() {
        const quill = new Quill(this.$refs.editor, {
            modules: {
                toolbar: this.$refs.toolbar,
            }
        });

        quill.setText(this.content);
        this.$refs.textarea.innerHTML = this.content;

        quill.on('text-change', (delta, oldDelta, source) => {
            this.$refs.textarea.innerHTML = quill.getSemanticHTML();
        });
    },

}));
