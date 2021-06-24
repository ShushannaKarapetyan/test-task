<template>
    <Sidebar/>
    <Navbar/>

    <div class="col-md-9 offset-md-3">
        <router-view></router-view>
    </div>
</template>

<script>
import Sidebar from "../layouts/Sidebar";
import Navbar from "../layouts/Navbar";

export default {
    name: "Dashboard",
    components: {
        Navbar,
        Sidebar
    }
}
</script>
