<template>
    <v-app id="inspire">
        <AppHeader>

        </AppHeader>

        <v-main>
            <router-view></router-view>

        </v-main>
    </v-app>

</template>

<script>
import AppHeader from '../components/header/Header.vue'
import PostCard from '../components/post-card/PostCard.vue'
export default {
    name: "App",
    components: {
        AppHeader,
        PostCard
    }
}
</script>

<style>

</style>
