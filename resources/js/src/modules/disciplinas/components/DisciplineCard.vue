<template>
        <v-card>
            <v-card-title primary-title>
                <div>
                    <h3 class="headline mb-4">{{ discipline.name }}</h3>
                    <div>
                        <ul>
<!--                            <li>{{ discipline.slug}}</li>-->
                            <li>{{ discipline.teacherName || 'Nenhum professor definido'}}</li>
                            <li>{{ discipline.classesForWeek || 'Quantidade de aulas por semana indefinida'}}</li>
                        </ul>
                    </div>
                </div>
            </v-card-title>
        </v-card>
</template>

<script>
    export default {
        name: "DisciplineCard",
        props: {
            discipline: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>