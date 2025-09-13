
class Block {
    constructor(type, position) {
        this.type = type;
        this.position = position;
        this.content = '';
    }
}

Alpine.data('createBlog', () => ({

    blocks: [],

    addBlock(type) {
        this.blocks.push(new Block(type, this.blocks.length));
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
        console.log(this.blocks);
    }

}));
