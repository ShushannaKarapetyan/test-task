<template>
    <div id="main">
        <header id="header">

        </header>
        <div id="content">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
import Navbar from "./components/layouts/Navbar";

export default {
    name: "index",

    components: {
        Navbar,
    },
}
</script>
