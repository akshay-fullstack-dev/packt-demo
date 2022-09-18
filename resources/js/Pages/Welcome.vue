<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Header from '../Layouts/Header.vue';
import OurClients from '@/Components/OurClients.vue';
import BooksCategory from '../Components/BooksCategory.vue';
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String
})
</script> 

<template>

    <Head title="Dashboard" />
    <Header :can-register= canRegister />
    <main id="content">
        <!-- hero start -->
        <div id="hero" class="section relative z-0 py-16 md:pt-32 md:pb-20 bg-gray-50 bg-banner-code bg-right pb-1.5">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <div class="flex flex-wrap flex-row -mx-4 justify-center">
                    <!-- text -->
                    <div class="flex-shrink max-w-full px-4 w-full md:w-9/12 lg:w-1/2 self-center lg:pr-12">
                        <div class="text-center lg:text-left mt-6 lg:mt-0">
                            <div class="mb-12">
                                <h1 class="text-5xl leading-snug text-natural font-bold mb-4">Access the most
                                    comprehensive eBook library in tech
                                </h1>
                                <p class="text-natural leading-relaxed font-light text-xl mx-auto pb-2">All the
                                    practical content you’ll ever need to get the job done</p>
                            </div>
                            <a class="focus:outline-none text-white bg-[#ea580c] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                href="#contact">
                                Start Learning Now
                            </a>
                        </div>
                    </div>
                    <!-- content -->
                    <div class="flex-shrink max-w-full px-4 sm:px-12 lg:px-18 w-full sm:w-9/12 lg:w-1/2 self-center">
                        <img src="	https://www.packtpub.com/images/home-page/access-content.webp"
                            class="w-full max-w-full h-auto" alt="creative agency">
                    </div><!-- end content -->
                </div>
            </div>
        </div><!-- end Hero -->
        <OurClients />
        <BooksCategory />
    </main>
</template>


