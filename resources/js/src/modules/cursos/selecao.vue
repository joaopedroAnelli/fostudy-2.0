<template>
    <v-container>
        <v-layout>
            <course-card @click="subscript()" :key="course.id" v-for="course in courses" :course="course"/>
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
        },

        methods: {
            subscript(id) {
                alert('Se inscreveu!!')
            }
        }
    }
</script>

<style scoped>

</style>