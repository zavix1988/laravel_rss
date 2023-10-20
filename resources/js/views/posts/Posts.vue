<script>

import {defineComponent} from "vue";
import PostCard from "../../components/post-card/PostCard.vue";

export default defineComponent({
    components: {PostCard}
})
</script>

<template>
    <v-container>
        <v-row>
            <PostCard
                v-for="n in 24"
                :key="n"
            ></PostCard>
        </v-row>
    </v-container>
</template>

<style scoped>

</style>
