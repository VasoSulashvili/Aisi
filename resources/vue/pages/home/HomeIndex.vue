<template>
    <div>
        <HomeSlider />

        <HomeBranches />
    </div>

</template>

<script>
import HomeSlider from "./HomeSlider.vue";
import HomeBranches from "./HomeBranches.vue";
export default {
    name: "HomeIndex",
    components: {
        HomeSlider,
        HomeBranches
    }
}
</script>

<style scoped>

</style>
