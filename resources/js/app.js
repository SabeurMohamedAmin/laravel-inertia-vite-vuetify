import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { Head, Link } from "@inertiajs/vue3";

//Here comes vuetify settings
import { createVuetify } from "vuetify";
//After Enabling treeshaking in vite.config no need for these
//import * as components from 'vuetify/components'
//import * as directives from 'vuetify/directives'
// Styles
import "@mdi/font/css/materialdesignicons.css";
import "vuetify/styles";

//Forced Global Layout
import Layout from "@/Layouts/GuestLayout.vue";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    //resolve: (name) => resolvePageComponent(
    //    `./Pages/${name}.vue`,
    //    import.meta.glob('./Pages/**/*.vue')),
    resolve: (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );

        page.then((module) => {
            module.default.layout = module.default.layout || Layout; // Make Layout Global
        });
        return page;
    },

    setup({ el, App, props, plugin }) {
        const vuetify = createVuetify({
            theme: {
                themes: {
                    light: {
                        dark: false,
                    },
                },
            },
        });
        return createApp({ performance: true, render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .use(ZiggyVue, Ziggy)
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
        showSpinner: true,
    },
});
