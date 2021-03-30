<template>
    <div class="loading-animation post-index__loading" v-if="itemLoading">
        <img class="post-index__loading-img" v-bind:src="loading">
    </div>
</template>

<script>
export default {
    name: "ImageIndex",
    data: () => ({
        itemLoading: false,
        load: true,
        page: 1,
    }),
    props: {
        loading: {
            type: String
        },
    },

    mounted(){
        this.clearVar()
        window.onscroll = () => {
            let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight >= document.documentElement.offsetHeight;
            if (bottomOfWindow) this.getItems();
        };
        this.getItems()
    },

    methods: {
        clearVar() {
            this.itemLoading = false
            this.load = true
            this.page = 1
        },
        createElementFromHTML(html) {
            const tempEl = document.createElement('div');
            tempEl.innerHTML = html;
            return tempEl;
        },
        async getItems() {
            if (this.load) {
                if (!this.itemLoading) {
                    this.itemLoading = true
                    try {
                        const response = await axios.get('/images?page=' + this.page)

                        const convertToDom = this.createElementFromHTML(response.data)
                        const nextImageIndex = convertToDom.querySelector('.post-index__contents')
                        const currentImageIndex = document.querySelector('.post-index__wrapper')
                        currentImageIndex.appendChild(nextImageIndex)

                        const lastPageNum = document.querySelector('#post-index__last-page')

                        if(parseInt(lastPageNum.innerText) === this.page) {
                            this.load = false
                        }

                        this.page += 1
                    } catch (e) {
                        console.log(e.response)
                        this.load = false
                        this.itemLoading = false
                    } finally {
                        this.itemLoading = false
                    }
                }
            }
        },
    }
}

</script>
