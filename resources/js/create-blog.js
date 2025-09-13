
class Block {
    constructor(type, position) {
        this.title = '';
        this.type = type;
        this.position = position;
        this.content = '';
    }
}

Alpine.data('createBlog', () => ({

    blocks: [],

    addBlock(type) {
        this.blocks.push(new Block(type, this.blocks.length));

        if(type === 'image') {
            this.blocks.at(-1).content = [];
            this.blocks.at(-1).preview = '';
        }
    },

    deleteBlock(position) {
        return this.blocks.splice(position, 1);
    },

    move(from, to) {
        if(to < 0 || to > this.blocks.length - 1)
            return;

        const block = this.deleteBlock(from)[0];

        this.blocks.splice(to, 0, block);
    },

    moveUp(position) {
        this.move(position, position - 1);
    },

    moveDown(position) {
        this.move(position, position + 1);
    },

    setTextContent(position, content) {
        this.blocks[position].content = content;
    },

    submit() {
        this.$wire.call('transferBlocks', this.blocks).then(() => {
            this.$wire.call('submit');
        });
    },

    uploadImage(position, event) {

        const file = event.target.files[0];

        if(file) {
            this.blocks[position].content.push(file);

            const reader = new FileReader();

            reader.onload = e => {
                this.blocks[position].preview = e.target.result;
            };

            reader.readAsDataURL(file);

        }
    }

}));
