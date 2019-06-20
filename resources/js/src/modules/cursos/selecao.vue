<template>
    <v-container>
        <v-layout column fill-height>
            <h1>Escolha seu curso</h1>
            <v-divider class="mb-5"/>

            <v-container>
                <v-layout>
                    <v-flex xs12 sm12 md6 lg3>
                        <course-card :key="course.id" v-for="course in courses" :course="course"/>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-layout>
    </v-container>
</template>

<script>
    import CourseCard from './components/CourseCard'


    export default {
        name: "index",
        components: {
            CourseCard
        },
        data() {
            return {
                courses: []
            }
        },


        mounted() {
            axios.get('/api/courses').then(r => {
                this.courses = r.data
            })
        }
    }
</script>

<style scoped>

</style>