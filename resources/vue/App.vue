<template>
    <header>
        <Header />
    </header>

    <main>

        <router-view v-slot="{ Component }">
            <transition name="fade">
                <component :is="Component" />
            </transition>
        </router-view>


    </main>

    <MainFooter />
</template>
<script>
import Header from "./layouts/Header.vue";
import MainFooter from "./layouts/MainFooter.vue";
import HomeIndex from "./pages/home/HomeIndex.vue";
export default {
    name: "App",
    components: {
        Header,
        MainFooter
    },
}
</script>

<style scoped>

</style>
