import Vue from "vue";
import VueRouter from "vue-router";
import { LMap, LTileLayer, LMarker } from "vue2-leaflet";
import "leaflet/dist/leaflet.css";
import "leaflet/dist/leaflet.css";
Vue.component("l-map", LMap);
Vue.component("l-tile-layer", LTileLayer);
Vue.component("l-marker", LMarker);
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.use(VueRouter);

import App from "./views/App.vue";
const router = new VueRouter({
    routes: [{
            path: "/",
            name: "home",
            component: () =>
                import ("./views/Home.vue")
        },
        {
            path: "/login",
            name: "login",
            component: () =>
                import ("./views/Login.vue")
        }
    ]
});

const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
        .split("/")
        .pop()
        .split(".")[0],
        files(key).default
    )
);

import VueI18n from "vue-i18n";
import messages from "./locales";
Vue.use(VueI18n);
const i18n = new VueI18n({
    fallbackLocale: "kk",
    locale: "kk", // set locale
    messages // set locale messages
});

new Vue({
    i18n,
    router,
    render: h => h(App)
}).$mount("#app");