<template>
    <div class="wrapper col-md-3 float-left">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p> Heading</p>
                <li>
                    <router-link :to="{name: 'attach.role'}">Attach Role</router-link>
                </li>
<!--                <li>-->
<!--                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"-->
<!--                       class="dropdown-toggle">Pages</a>-->
<!--                    <ul class="collapse list-unstyled" id="pageSubmenu">-->
<!--                        <li>-->
<!--                            <a href="#">Page 1</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">Page 2</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">Page 3</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">Portfolio</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">Contact</a>-->
<!--                </li>-->
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: "Sidebar",
}
</script>

<style scoped>
.wrapper {
    display: flex;
    width: 100%;
}

#sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 999;
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
}

a {
    color: white;
}

ul {
    padding-left: 10px;;
}
</style>
