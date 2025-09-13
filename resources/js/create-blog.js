
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
            this.blocks.at(-1).content = '';
            this.blocks.at(-1).file = null;
        }
    },

    deleteBlock(position) {
        return this.blocks.splice(position, 1);
    },

    move(from, to) {
        if(to < 0 || to > this.blocks.length - 1)
            return;

        this.blocks[from].position = to;
        this.blocks[to].position = from;

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
        this.$wire.call('transferBlocks', this.blocks).then(async () => {
            // for(const block of this.blocks) {
                // if(block.type === 'image') {
                //     this.$wire.call('uploadImage', {
                //         position: block.position,
                //         image: block.preview,
                //     });
                // }
            // }
            this.$wire.call('submit');
        }).then(() => {
            // this.$wire.call('submit');
        });
    },

    uploadImage(position, event) {

        const file = event.target.files[0];

        if(file) {
            this.blocks[position].file = file;

            const reader = new FileReader();

            reader.onload = e => {
                this.blocks[position].content = e.target.result;
            };

            reader.readAsDataURL(file);

        }
    }

}));
