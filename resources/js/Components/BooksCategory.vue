<template>
    <div>
        <h2 class="font-bold text-blue-900 text-1xl">Vue Js tabs</h2>
        <div class="container mx-auto">
            <ul class="flex justify-center space-x-2 text-white">
                <li>
                    <button @click="currentTab(1)" class="inline-block px-4 py-2 bg-blue-500">
                        Tab 1
                    </button>
                </li>
                <li>
                    <button @click="currentTab(2)" class="inline-block px-4 py-2 bg-blue-500">
                        Tab 2
                    </button>
                </li>
                <li>
                    <button @click="currentTab(3)" class="inline-block px-4 py-2 bg-blue-500">
                        Tab 3
                    </button>
                </li>
            </ul>
            <div class="p-3 mt-6 bg-white border">
                <div v-if="tab === 1">
                    Tab 1 Content show Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Quas sunt ducimus numquam! Quam, perspiciatis!
                </div>
                <div v-if="tab === 2">
                    Tab 2 Content show Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. aliquam rem. Exercitationem corporis eius voluptatibus.
                </div>
                <div v-if="tab === 3">
                    Tab 3 Content show Lorem ipsum dolor sit amet consectetur adipisicing
                    elit.
                </div>
            </div>
        </div>
    </div>
</template>
  

<script>
export default {
    async mounted() {
        await axios.get('api/categories')
            .then(response => {
                this.categories = response.data
            })
        this.showCategories();
    },
    methods: {
        currentTab: function (tabNumber) {
            this.tab = tabNumber;
        },
        showCategories() {
            //    if categories are emptry then return from here
            if (!this.categories.length > 0) {
                alert('no categories found')
            }


        }

    },

    data: function () {
        return {
            categories: [],
            tab: 1,
        }
    }
}
</script>

<style lang="scss" scoped>

</style>