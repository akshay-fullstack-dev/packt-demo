<template>
    <div class="category-title text-center">
        <div>
            POPULAR CONTENT BY CATEGORY
        </div>
        <div id="category-name mt-3">
            <h1 class="text-3xl">{{openTab}}</h1>
        </div>
    </div>
    <div class="flex flex-wrap w-4/5 text-center mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="2xl:container 2xl:mx-auto md:py-12 lg:px-20 md:px-6 py-9 px-4">
                <!-- - more free and premium Tailwind CSS components at https://tailwinduikit.com/ - -->
                <div class="text-center">
                    <ul class='flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row'>
                        <li class="-mb-px mr-2 flex-auto text-center" v-for="category in categories">
                            <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal"
                                v-on:click="toggleTabs(category.name)"
                                v-bind:class="{'text-pink-600 bg-white': openTab !== category.name, 'text-[#ea580c] bg-pink-600 border-b-4': openTab === category.name}">
                                {{category.name}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:grap-8 md:gap-6 gap-4 mt-10">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" v-for="book in selectedBooks">
                        <img class="w-full" src="https://static.packt-cdn.com/products/9781800562523/cover/smaller"
                            alt="Mountain">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{book.title}}</div>
                            <p class="text-gray-700 text-base">
                                {{book.author}}
                            </p> {{book.publication_date}} &middot; {{book.book_length}} pages
                        </div>
                        <!-- <div class="px-2">{{book.author}}</div> -->
                        <div class="px-6 pt-4 pb-2">
                            <p v-if="book.reviews_rating ==0">No rating</p>
                            <star-rating v-else :rating=book.reviews_rating />
                        </div>
                    </div>
                </div>
                <button @click="backArrow"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    <h1><svg data-v-3f1f509a="" fill="none" viewBox="0 0 65 24" height="24" width="65"
                            xmlns="http://www.w3.org/2000/svg">
                            <path xmlns="http://www.w3.org/2000/svg"
                                d="M0.939339 10.9393C0.353554 11.5251 0.353554 12.4749 0.939339 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939339 10.9393ZM65 10.5L2 10.5V13.5L65 13.5V10.5Z"
                                fill="#AAAAAA" fill-opacity="0.6"></path>
                        </svg></h1>
                </button>
                <button @click="frontArrow"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    <h1><svg data-v-3f1f509a="" fill="none" viewBox="0 0 65 24" height="24" width="65"
                            xmlns="http://www.w3.org/2000/svg">
                            <path xmlns="http://www.w3.org/2000/svg"
                                d="M64.0607 13.0607C64.6464 12.4749 64.6464 11.5251 64.0607 10.9393L54.5147 1.3934C53.9289 0.807611 52.9792 0.807611 52.3934 1.3934C51.8076 1.97919 51.8076 2.92893 52.3934 3.51472L60.8787 12L52.3934 20.4853C51.8076 21.0711 51.8076 22.0208 52.3934 22.6066C52.9792 23.1924 53.9289 23.1924 54.5147 22.6066L64.0607 13.0607ZM0 13.5H63V10.5H0L0 13.5Z"
                                fill="#AAAAAA" fill-opacity="0.6"></path>
                        </svg></h1>
                </button>
            </div>
        </div>
    </div>
</template>
  
<script>
import axios from 'axios'
import StarRating from 'vue-star-rating'

export default {
    name: 'BookCategories',
    components: { StarRating },
    data() {
        return {
            currentIndex: 0,
            openTab: '',
            categories: [],
            prevArrow: 1,
            booksList: [],
            selectedBooks: [],
        }
    },
    methods: {
        frontArrow: function () {
            if (this.currentIndex == 0) {
                this.currentIndex = 6;
            }
            this.currentIndex--;
            this.showBooks()

        },
        backArrow: function () {
            if (this.currentIndex == 6) {
                this.currentIndex = 0;
            }
            this.showBooks()
        },

        toggleTabs: async function (tabName) {
            this.openTab = tabName
            await this.getBooks();
            this.showBooks()
        },
        getBooks: async function () {
            const response = await fetch(`https://www.packtpub.com/api/products/category/${this.openTab}`)
            let data = await response.json();
            this.booksList = data.data;
        },
        showBooks: function () {
            let books = this.booksList.slice(this.currentIndex, this.currentIndex + 4);
            books.forEach(async function (book) {
                book.publication_date = new Date(book.publication_date).toLocaleString('en-us', { month: 'short', year: 'numeric' })
            });
            this.selectedBooks = books;

        }
    },
    async created() {
        await axios.get('api/categories')
            .then(response => this.categories = response.data
            )
        this.openTab = this.categories[0].name
        await this.toggleTabs(this.openTab)
        this.showBooks()
    },
}
</script>