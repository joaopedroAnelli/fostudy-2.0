<template>
    <v-flex column>
        <h1>Instituições</h1>
        <v-divider/>
        <v-data-table v-if="false"
                      :headers="headers"
                      :items="institutions"
                      class="elevation-1"
        >
            <template v-slot:items="props">
                <td>{{ props.item.id }}</td>
                <td class="text-xs-right">{{ props.item.name }}</td>
                <td class="text-xs-right">{{ props.item.courses_quantity }}</td>
            </template>
        </v-data-table>

        <div v-else>
            <v-alert
                    :value="true"
                    type="info"
            >
                Nenhuma instituição cadastrada.
            </v-alert>

            <v-btn color="success">Cadastrar</v-btn>
        </div>


    </v-flex>
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
                    { text: 'Nome', value: 'name' },
                    { text: 'Cursos qtd', value: 'courses_quantity' },
                ],
                institutions: [
                    {
                        id: 13422,
                        name: 'Frozen Yogurt',
                        courses_quantity: 159,
                    },
                    {
                        id: 13423,
                        name: 'Ice cream sandwich',
                        courses_quantity: 237,
                    },
                    {
                        id: 13424,
                        name: 'Eclair',
                        courses_quantity: 262,
                    },
                ]
            }
        }
    }
</script>

<style scoped>

</style>