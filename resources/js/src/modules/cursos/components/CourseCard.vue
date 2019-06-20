<template>
    <v-flex @click="subscript">
        <v-card class="card">
            <v-card-title primary-title>
                <div>
                    <h3 class="headline mb-4">{{ course.name }}</h3>
                    <div>
                        <ul>
                            <li>{{ course.seasons_quantity}} temporadas</li>
                            <li>{{ course.months_per_season}} meses por temporada</li>
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

        methods: {
            subscript() {
                this.$router.push('/disciplinas/selecao?courseId=' + this.course.id)
            }
        }
    }
</script>

<style scoped>

    .card {
        cursor: pointer;
    }

</style>