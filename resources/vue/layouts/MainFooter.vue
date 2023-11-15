<template>
    <footer id="main-footer" class="py-5">
        <div class="container mx-auto font-Noto-Sans-Georgian text-ink text-center md:text-left md:flex md:justify-around">
            <section class="flex justify-center mx-auto pt-20 md:py-10 mt-10">
                <a href="">
                    <img id="footer-logo" src="../../assets/media/logo.png" alt="Aisi">
                </a>
                <h1 class="text-4xl ml-10 pt-5">აისი</h1>
            </section>
            <section class="mx-auto py-10 mt-10">
                <div>
                    <ul>
                        <li><i class="las la-phone text-xl font-semibold pr-3"></i><span>+995 599 99 99 99</span></li>
                        <li><i class="las la-envelope text-xl font-semibold pr-3"></i><span>info@aisi.ge</span></li>
                        <li>
                            <ul class="flex justify-center text-3xl mt-10 text-red ">
                                <li><a href="http://facebook.com"><i class="lab la-facebook pr-2"></i></a></li>
                                <li><a href="http://facebook.com"><i class="lab la-youtube pr-2"></i></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </section>
            <section class="mx-auto py-10 mt-10 hidden md:block">
                <ul class="text-sm font-Noto-Sans-Georgian text-ink">
                    <li class="hover:text-red"><router-link to="/">მთავარი</router-link></li>
                    <li class="hover:text-red"><router-link to="/groups">ჯგუფები</router-link></li>
                    <li class="hover:text-red"><router-link to="/events">ღონისძიებები</router-link></li>
                    <li class="hover:text-red"><router-link to="/about/us">ჩვენს შესახებ</router-link></li>
                    <li class="hover:text-red"><router-link to="/blog">ბლოგი</router-link></li>
                </ul>
            </section>
        </div>
        <p class="container text-center mt-5 px-10 text-sm">
            Copyright © {{ 2023 }} Aisi. All Rights Reserved. Developed By
            <a class="text-ink font-semibold" href="mailto:v.sulashvili@gmail.com">Vaso Sulashvili</a>
        </p>
    </footer>
</template>

<script>
export default {
    name: "MainFooter",
    yeer: new Date().getFullYear()
}
</script>

<style scoped>
    #main-footer {
        background-color: #E9e9e9
    }
    .router-link-active {
        text-decoration: underline;
    }
    #footer-logo {
        width: 80px;
        height: auto;
    }
</style>
