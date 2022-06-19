require("./bootstrap");

window.$ = window.jQuery = require("jquery");
window.Popper = require("popper.js");
import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import itemIndex from "./Componenets/Item/Index";
import ItemCreate from "./Componenets/Item/Create";
import Navbar from "./Componenets/Navbar";

const routes = [
    { path: "/", component: itemIndex },
    { path: "/create", component: ItemCreate },
];

const router = createRouter({
    history: createWebHistory(""),
    routes,
});

const app = createApp({});
app.use(router);
app.component("item-index", itemIndex);
app.component("item-create", ItemCreate);
app.component("item-nav", Navbar);
app.mount("#app");
