<template>
    <div class="py-8 bg-slate-100">
        <nav class="container mx-auto flex justify-around">
            <div class="flex">
                <a href="/">
                    <img id="header-logo" src="../../assets/media/logo.png" alt="Aisi">
                </a>
                <h1 class="text-3xl ml-5">აისი</h1>
            </div>
            <ul class="space-x-5 hidden md:flex">
                <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/">მთავარი</router-link></li>
                <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/groups">ჯგუფები</router-link></li>
                <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/events">ღონისძიებები</router-link></li>
                <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/about/us">ჩვენს შესახებ</router-link></li>
                <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/blog">ბლოგი</router-link></li>
            </ul>
            <div class="md:hidden">
                <i v-show="!showNav" @click="showNav = !showNav" class="las la-bars text-3xl"></i>
                <i v-show="showNav" @click="showNav = !showNav" class="las la-times text-3xl"></i>
                <div id="dd-menu" class="absolute bg-white h-full w-full left-0" v-show="showNav">
<!--                    <div class="flex justify-end mr-10 mt-10">-->
<!--                        <i @click="showNav = !showNav" class="las la-bars text-3xl"></i>-->
<!--                    </div>-->

                    <div class="flex justify-end mr-10 mt-10">
                        <ul class="">
                            <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/">მთავარი</router-link></li>
                            <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/groups">ჯგუფები</router-link></li>
                            <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/events">ღონისძიებები</router-link></li>
                            <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/about/us">ჩვენს შესახებ</router-link></li>
                            <li class="font-Noto-Sans-Georgian font-semibold text-ink hover:text-red"><router-link to="/blog">ბლოგი</router-link></li>
                        </ul>
                    </div>
                </div>
            </div>


        </nav>
    </div>

</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            showNav: false
        }
    }
}
</script>

<style scoped lang="scss">
@import "../../css/styles";
    .router-link-active {
        color: $red
    }
    #header-logo {
        width: 50px;
        height: auto;
    }

    #dd-menu {
        top: 110px;
    }

</style>
