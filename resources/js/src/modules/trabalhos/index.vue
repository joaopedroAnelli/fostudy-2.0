<template>
    <v-container>
        <v-layout column fill-height>
            <h1>Trabalhos</h1>
            <v-divider class="mb-5"/>



            <v-data-table v-if="homeworks.length"
                          :headers="headers"
                          :items="homeworks"
                          class="elevation-1"
            >
                <template v-slot:items="props">
                    <td>{{ props.item.id }}</td>
                    <td>{{ props.item.name }}</td>
                    <td>{{ props.item.created_at }}</td>
                    <td>{{ props.item.delivery_at }}</td>
                    <td>{{ props.item.discipline.name }}</td>
                </template>
            </v-data-table>




            <div v-else>
                <v-alert
                        :value="true"
                        type="info"
                >
                    Nenhum trabalho cadastrado.
                </v-alert>

            </div>

            <v-btn
                    @click="$router.push('/trabalhos/novo')"
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
                    { text: 'Nome', value: 'name'},
                    { text: 'Criado em', value: 'created_at'},
                    { text: 'Entrega para', value: 'delivery_at'},
                    { text: 'Disciplina', value: 'discipline.name'},
                ],
                homeworks: []
            }
        },

        mounted() {
            axios.get('/api/homeworks').then(r => {
                r.data.forEach(homework => {
                    homework.created_at = moment(homework.created_at).format('DD/MM/YYYY [às] HH[h]mm')
                    homework.delivery_at = moment(homework.delivery_at).format('DD/MM/YYYY [às] HH[h]mm')
                    this.homeworks.push(homework)
                })
            })
        }
    }
</script>

<style scoped>

</style>