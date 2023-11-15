<template>
    <section>
        <div id="slider-wrapper" class="max-w-full box-border"
             :style="{ backgroundImage: 'url(' + slider.image_public_path + ')' }"
            v-for="(slider, key) of sliders"
            :key="slider.id"
            v-show="active === key">

            <div class="container box-border mx-auto py-40 flex items-stretch h-full">
                <button class="" @click="previus()">
                    <i class="las la-angle-left text-6xl"></i>
                </button>

                <div class="grow md:mx-20">

                    <h1 style="overflow-wrap: break-word;"  class=" box-border mw-100 text-5xl mb-10 font-Noto-Sans-Georgian font-semibold text-beige break-words">
                        {{ slider.title }}
                    </h1>
                    <div class="mb-10 font-Noto-Sans-Georgian font-semibold text-beige break-words" v-html="slider.description"></div>

                    <button class="bg-red px-8 py-4 font-semibold text-beige hover:bg-ink">
                        <a :href="slider.url">Read More</a>
                    </button>
                </div>

                <button class="" @click="next()">
                    <i class="las la-angle-right text-6xl self-center"></i>
                </button>


            </div>

        </div>
    </section>
</template>

<script>

import {baseUrl} from "../../configs.js";
import * as timers from "timers";
export default {
    name: "HomeSlider",
    data() {
        return {
            loading: false,
            sliders: [],
            active: 0,
            length: null,
        }
    },

    computed: {

    },
    created() {
        this.fetchSliders()
        console.log(this.sliders)
        const self = this;
        var active = this.active;

        setInterval(function(){
            console.log(active)
            if(self.active !== self.length - 1) {
                self.active ++;
            } else {
                self.active = 0;
            }
        },50000);
    },

    methods: {
        async fetchSliders()
        {
            try {
                const response = await fetch(baseUrl + '/sliders');
                const {data: sliders} = await response.json();

                this.sliders = sliders;
                this.length = sliders.length
                console.log(sliders)
            } catch (error) {
                console.error(error);
            }
        },
        previus()
        {
            if(this.active === 0) {
                this.active =  this.length - 1;
            } else {
                this.active--;
            }
        },

        next()
        {
            if(this.active !== this.length - 1) {
                this.active ++;
            } else {
                this.active = 0;
            }
        }
    }
}
</script>

<style scoped>

#slider-wrapper {
    background-position: center;
    height: 800px;
}

</style>
