<template>
    <section class="container mx-auto grid grid-cols-12 gap-8 my-20">
        <section class="col-span-9 grid grid-cols-12 gap-2">
            <article class="col-span-6 mb-10"
                v-for="(article, key) of articles" key="key">
                <img :src="article.image_public_path" alt="" srcset="">

                <h2 class="my-3 text-2xl text-gray-500">{{ article.title }}</h2>
                <h4 class=" text-gray-500"><i class="las la-user"></i> {{ article.author.name }}</h4>
                <div class="my-5" v-html="article.description"></div>
            </article>
        </section>
        <aside class="col-span-3">
            <h2 class="text-xl text-gray-500 text-center mb-10">უახლესი სტატიები</h2>
            <div class="mb-16"
                v-for="(article, key) of recentArticles"
                :key="key">
                <img :src="article.image_public_path" alt="" srcset="">
                <h2 class="text-xl text-gray-500">{{ article.title }}</h2>
            </div>
        </aside>
    </section>
</template>

<script>
import {baseUrl} from "../../configs.js";

export default {
    name: "BlogIndex",

    data()
    {
        return {
            articles: [],
            recentArticles: []
        }
    },

    created() {
        this.fetchArticles();
        this.fetchRecentArticles();
    },

    methods: {
        async fetchArticles() {

            try {
                const response = await fetch(baseUrl + '/blog/articles');
                const { data: articles } = await response.json();

                this.articles = articles;
                console.log(this.articles)
            } catch (error) {
                console.error(error);
            }
        },

        async fetchRecentArticles() {

            try {
                const response = await fetch(baseUrl + '/blog/articles/recent');
                const { data: recentArticles } = await response.json();

                this.recentArticles = recentArticles;
                console.log(this.articles)
            } catch (error) {
                console.error(error);
            }
        }
    }
}
</script>

<style scoped>

</style>
