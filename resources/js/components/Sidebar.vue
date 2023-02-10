<template>
            <div class="sidebar">
                <div class="sidebar_header">
                    SERVERS
                </div>
                <ul>
                    <li>
                        <router-link :to="{name:'dashboard'}" class="item">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span>Dashboard</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'users'}" class="item">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <span>Users</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'roles'}" class="item">
                            <span class="icon"><i class="fas fa-lock"></i></span>
                            <span>Roles</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'permissions'}" class="item">
                            <span class="icon"><i class="fas fa-user-shield"></i></span>
                            <span>Permissions</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{name:'serveurs'}" class="item">
                            <span class="icon"><i class="fas fa-server"></i></span>
                            <span>Servers</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/logout" class="item">
                            <span class="icon"><i class="fas fa-power-off"></i></span>
                            <span>Logout</span>
                        </router-link>
                    </li>
                </ul>
            </div>
</template>

<script setup>


</script>

<style scoped>

.sidebar ul li a.router-link-exact-active,
.sidebar ul li a.router-link-exact-active .icon {
    background: #dd3333;
    color: #fff;
}

/* .sidebar ul li a.router-link-exact-active:hover {
  
} */


</style>
