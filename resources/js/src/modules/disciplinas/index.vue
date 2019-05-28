<template>
    <v-container>
        <v-layout>
            <discipline-card/>
        </v-layout>
    </v-container>
</template>

<script>
    import DisciplineCard from './components/DisciplineCard'


    export default {
        name: "index",
        data () {
            return {
                headers: [
                    {
                        text: 'Id',
                        align: 'left',
                        sortable: true,
                        value: 'id'
                    },
                    { text: 'Nome', value: 'name'},
                    { text: 'Cursos qtd', value: 'courses_quantity'},
                ],
                institutions: []
            }
        },

        components: {
            DisciplineCard
        },

        mounted() {
            swal({
                title: "Heyy",
                text: "Você não está inscrito em nenhum curso. Deseja se inscrever agora?",
                icon: "warning",
                buttons: ['Dashboard', 'Sim!'],
                dangerMode: true,
            })
                .then((willInscrit) => {
                    if (willInscrit) {
                        this.$router.push('/cursos/selecao')
                    } else {
                        this.$router.push('/dashboard')
                    }
                });
        }
    }
</script>

<style scoped>

</style>