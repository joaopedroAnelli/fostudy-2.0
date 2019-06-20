<template>
    <v-container>
        <v-layout column fill-height>
            <h1>Provas</h1>
            <v-divider class="mb-5"/>



            <v-data-table v-if="tests.length"
                          :headers="headers"
                          :items="tests"
                          class="elevation-1"
            >
                <template v-slot:items="props">
                    <td>{{ props.item.id }}</td>
                    <td>{{ props.item.created_at }}</td>
                    <td>{{ props.item.starts_at }}</td>
                    <td>{{ props.item.discipline.name }}</td>
                </template>
            </v-data-table>




            <div v-else>
                <v-alert
                        :value="true"
                        type="info"
                >
                    Nenhuma prova cadastrado.
                </v-alert>

            </div>

            <v-btn
                    @click="$router.push('/provas/novo')"
                    absolute
                    dark
                    fab
                    bottom
                    right
                    color="success"
                    class="mb-5"
            >
                <v-icon>add</v-icon>
            </v-btn>
        </v-layout>
    </v-container>
</template>

<script>
    import moment from 'moment'
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
                    { text: 'Disciplina', value: 'discipline.name'},
                    { text: 'Horário', value: 'starts_at'},
                    { text: 'Criado em', value: 'created_at'},
                ],
                tests: []
            }
        },

        mounted() {
            axios.get('/api/tests').then(r => {
                r.data.forEach(test => {
                    test.created_at = moment(test.created_at).format('DD/MM/YYYY [às] HH[h]mm')
                    test.starts_at = moment(test.starts_at).format('DD/MM/YYYY [às] HH[h]mm')
                    this.tests.push(test)
                })
            })
        }
    }
</script>

<style scoped>

</style>