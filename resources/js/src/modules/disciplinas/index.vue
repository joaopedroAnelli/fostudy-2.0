<template>
    <v-container>
        <v-layout>
            <v-flex xs12 sm12 md6 lg3
                    v-for="discipline in disciplines"
                    :key="discipline.id"
            >
                <discipline-card
                        :discipline="discipline"
                />
            </v-flex>
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
                disciplines: []
            }
        },

        components: {
            DisciplineCard
        },

        mounted() {

            axios.get('/api/disciplines').then(r => {
                this.disciplines = r.data
                this.showSwal()
            })

        },

        methods: {
            showSwal() {
                if (!this.disciplines.length) {
                    swal({
                        title: "Heyy",
                        text: "Você não está matriculado em nenhuma disciplina. Deseja se matricular agora?",
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
        }
    }
</script>

<style scoped>

</style>