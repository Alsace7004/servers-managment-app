<template>
    <!-- Begin -->
        <div class="wrapper">
            <!-- The Sidebar -->
                <Sidebar/>
            <!-- The Section -->
            <div class="section">
                <!-- The navbar -->
                    <Navbar />
                <!-- The Content -->
                <div class="content">
                    <div class="content_body">
                        <!-- router-view-begin -->
                            <ContentHeader message="Dashboard Page !!!"/>
                            Am The Dashboard Components !!!
                        <!-- router-view-end -->
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    <!-- End -->
</template>

<script setup>
    import Sidebar from "../components/Sidebar.vue"
    import Navbar from "../components/Navbar.vue"
    import ContentHeader from "../components/ContentHeader.vue"

</script>

<style scoped>

</style>
