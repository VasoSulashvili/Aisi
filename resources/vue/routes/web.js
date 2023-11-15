import HomeIndex from "../pages/home/HomeIndex.vue";
import BlogIndex from "../pages/blog/BlogIndex.vue";
import GroupIndex from "../pages/groups/GroupIndex.vue";
import EventIndex from "../pages/events/EventIndex.vue";
import AboutUsIndex from "../pages/aboutUs/AboutUsIndex.vue";
export default [
    { path: '/', component: HomeIndex },
    { path: '/groups', component: GroupIndex},
    { path: '/events', component: EventIndex},
    { path: '/about/us', component: AboutUsIndex},
    { path: '/blog', component: BlogIndex }
]
