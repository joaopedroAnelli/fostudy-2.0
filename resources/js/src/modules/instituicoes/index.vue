<template>
    <v-container>
        <v-layout column fill-height>
            <h1>Instituições</h1>
            <v-divider class="mb-5"/>



            <v-data-table v-if="institutions"
                          :headers="headers"
                          :items="institutions"
                          class="elevation-1"
            >
                <template v-slot:items="props">
                    <td>{{ props.item.id }}</td>
                    <td>{{ props.item.name }}</td>
                    <td>{{ props.item.courses_quantity }}</td>
                </template>
            </v-data-table>




            <div v-else>
                <v-alert
                        :value="true"
                        type="info"
                >
                    Nenhuma instituição cadastrada.
                </v-alert>

            </div>

            <v-btn
                    @click="$router.push('/instituicoes/novo')"
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

        mounted() {
            axios.get('/api/instituicoes').then(r => {
                this.institutions = r.data
            })
        }
    }
</script>

<style scoped>

</style>