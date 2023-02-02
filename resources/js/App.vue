<template>
    <div>
        <!-- Begin -->
        <div class="wrapper">
            <!-- The Sidebar -->
                <Sidebar/>
            <!-- The Section -->
            <div class="section">
                <!-- The navbar -->
                <Navbar/>
                <!-- The Content -->
                <div class="content">
                    <div class="content_body">
                        <router-view/>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
        <!-- End -->
    </div>
</template>

<script setup>
    import Sidebar from "./components/Sidebar.vue"
    import Navbar from "./components/Navbar.vue"
</script>
