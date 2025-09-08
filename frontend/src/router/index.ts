import {createRouter, createWebHistory} from "vue-router";
import Login from "../views/Login.vue";
import HelloWorld from "../components/HelloWorld.vue";

const routes = [{path: "/login", name: "Login", component: Login},
    {path: "/", name: "HelloWorld", component: HelloWorld}];

export default createRouter({
    history: createWebHistory(),
    routes,
});