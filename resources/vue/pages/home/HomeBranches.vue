<template>
    <section class="container mx-auto my-32 flex justify-between">
        <div class="mx-20 w-96"
            v-for="(branch, key) of branches"
            key="key">

            <img :src="branch.image_public_path" alt="" srcset="">

            <h2 class="text-2xl text-center">
                {{ branch.name }}
            </h2>

            <p class="text-slate-500">
                {{ branch.address }}
            </p>

        </div>
    </section>
</template>

<script>
import {baseUrl} from "../../configs.js";

export default {
    name: "HomeBranches",
    data() {
        return {
            loading: false,
            branches: [],
        }
    },

    created() {
        this.fetchBranches()
    },

    methods: {
        async fetchBranches()
        {
            try {
                const response = await fetch(baseUrl + '/branches');
                const {data: branches} = await response.json();
                this.branches = branches;
            } catch (error) {
                console.error(error);
            }
        },
    },
}
</script>

<style scoped>

</style>
