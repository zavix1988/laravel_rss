<script>
import ExtendedToolbar from "./ExtendedToolbar.vue";
import Header from "./Header.vue";

export default {
    name: "App",
    components: {
        Header
    }
}
</script>

<template>
    <v-app id="inspire">
        <Header></Header>

        <v-main>
            <v-container>
                <v-row>
                    <v-col
                        v-for="n in 24"
                        :key="n"
                        cols="4"
                    >
                        <v-card height="200"></v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<style scoped>

</style>
