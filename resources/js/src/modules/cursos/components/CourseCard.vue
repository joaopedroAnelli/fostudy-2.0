<template>
    <v-flex xs12 sm12 md6 lg3>
        <v-card class="card">
            <v-card-title primary-title>
                <div>
                    <h3 class="headline mb-4">{{ course.name }}</h3>
                    <div>
                        <ul>
                            <li>{{ course.name }}</li>
                            <li>{{ course.seasons_quantity}}</li>
                            <li>{{ course.months_per_season}}</li>
                        </ul>
                    </div>
                </div>
            </v-card-title>
        </v-card>
    </v-flex>
</template>

<script>
    export default {
        name: "DisciplineCard",
        props: {
            course: Object
        },
    }
</script>

<style scoped>

    .card {
        cursor: pointer;
    }

</style>