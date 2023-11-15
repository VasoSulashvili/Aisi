<template>
    <div>
        <div class="container mx-auto md:grid md:grid-cols-12 gap-4">
            <card-component
                @click=" setActiveBranch(branch.id); setGroups(branch.groups.data) "
                v-for="(branch, key) of branches" key="key" 
                :title="branch.name" 
                :image="branch.image_public_path">
            </card-component>

        </div>
        <div class="container mx-auto my-10 md:grid md:grid-cols-12 gap-4">

            <card-content-component
                v-for="(group, key) of groups" key="key" 
                :title="group.name"
                :image="group.image_public_path"
                :schedule="group.schedule">
            </card-content-component>

            <!-- <div class="col-span-4"
                >

                <h2 class="text-center py-5 text-xl">{{group.name}}</h2>
                <div>
                    <div class="flex py-3 space-x-2 justify-between"
                        v-for="(day, key) of JSON.parse(group.schedule)" key="key">
                        <p class="align-middle mr-10 flex place-content-center">
                            <i class="las la-calendar text-3xl mr-3 text-gray-400"></i>
                            <span class="text-xl pt-1"> {{day.day}}</span>
                        </p>
                        <p class="align-middle flex place-content-center">
                            <i class="las la-clock text-3xl mr-3 text-gray-400"></i>
                            <span class="text-xl pt-1">{{day.schedule_time_from}} - {{day.schedule_time_to}}</span>
                        </p>
                    </div>
                </div>

            </div> -->
        </div>
    </div>

</template>

<script>
import {baseUrl} from "../../configs.js";
import CardComponent from "./../../components/CardComponent.vue";
import CardContentComponent from "../../components/CardContentComponent.vue";
export default {
    name: "GroupIndex",
    components: {
        CardComponent,
        CardContentComponent
    },
    data() {
        return {
            groups: [],
            branches: [],
            activeBranch: 0,
        }
    },

    methods: {
        setActiveBranch(key) {
            this.activeBranch = key;
        },

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

        setGroups(groups)
        {
            this.groups = groups;
        }
    },

    created() {
        this.fetchBranches()
    },
}
</script>

<style scoped lang="scss">
    @import "../../../css/styles.scss";
    .activeBranch {
        border-bottom: 2px solid $red;
    }

</style>
