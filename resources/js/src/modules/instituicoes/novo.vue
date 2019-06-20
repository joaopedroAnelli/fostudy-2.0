<template>
    <v-container>
        <v-layout column fill-height>


            <h1>Nova Instituição</h1>
            <v-divider class="mb-5"/>


            <v-form v-model="valid">
                <v-container>
                    <v-layout column>
                        <v-flex xs12 sm12 md3>
                            <v-text-field
                                    v-model="institution.name"
                                    :rules="rules.name"
                                    label="Nome"
                                    required
                            />
                        </v-flex>
                        <v-flex md12>
                            <v-toolbar flat>
                                <v-toolbar-title>Cursos</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-dialog v-model="dialog" max-width="500px">
                                    <template v-slot:activator="{ on }">
                                        <v-btn color="primary" dark class="mb-2" v-on="on">Adicionar</v-btn>
                                    </template>
                                    <v-form v-model="courseIsValid" @submit.prevent="save">
                                        <v-card>
                                            <v-card-title>
                                                <span class="headline">{{ formTitle }}</span>
                                            </v-card-title>

                                            <v-card-text>
                                                <v-container grid-list-md>
                                                    <v-layout column>
                                                        <v-flex xs12 sm6 md4>
                                                            <v-text-field v-model="editedItem.name" label="Nome" required :rules="rules.courseName"/>
                                                        </v-flex>
                                                        <v-flex xs12 sm6 md6>
                                                            <v-text-field mask="##" v-model="editedItem.months_per_season" label="Meses por temporada" required :rules="rules.mps"/>
                                                        </v-flex>
                                                        <v-flex xs12 sm6 md6>
                                                            <v-text-field mask="###" v-model="editedItem.seasons_quantity" label="Quantidade de temporada" required :rules="rules.mps"/>
                                                        </v-flex>
                                                    </v-layout>
                                                </v-container>
                                            </v-card-text>

                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn color="blue darken-1" flat @click="close">Cancelar</v-btn>
                                                <v-btn color="blue darken-1" type="submit" flat>Save</v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-form>
                                </v-dialog>
                            </v-toolbar>
                            <v-data-table
                                    :headers="headers"
                                    :items="institution.courses"
                                    hide-actions
                            >
                                <template v-slot:items="props">
                                    <td>{{ props.item.name }}</td>
                                    <td>{{ props.item.months_per_season }}</td>
                                    <td>{{ props.item.seasons_quantity }}</td>
                                    <td class="justify-center0">
                                        <v-icon
                                                small
                                                class="mr-2"
                                                @click="editItem(props.item)"
                                        >
                                            edit
                                        </v-icon>
                                        <v-icon
                                                small
                                                @click="deleteItem(props.item)"
                                        >
                                            delete
                                        </v-icon>
                                    </td>
                                </template>

                                <template v-slot:no-data>
                                    <v-alert :value="true" color="secondary" icon="warning">
                                        Deve haver ao menos 1 curso cadastrado.
                                    </v-alert>
                                </template>
                            </v-data-table>
                        </v-flex>
                        <v-flex>
                            <v-card>
                                <v-btn
                                        @click="$router.push('/instituicoes')"
                                        absolute
                                        fab
                                        dark
                                        center
                                        left
                                        color="transparent"
                                        class="mb-5"
                                >
                                    <v-icon>arrow_back</v-icon>
                                </v-btn>

                                <v-btn
                                        @click="submit"
                                        absolute
                                        dark
                                        fab
                                        center
                                        right
                                        color="success"
                                        class="mb-5"
                                >
                                    <v-icon>check</v-icon>
                                </v-btn>
                            </v-card>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-form>
        </v-layout>
    </v-container>
</template>

<script>
    import sweetalert from 'sweetalert'

    export default {
        name: "index",
        data () {
            return {
                valid: false, courseIsValid: false,
                dialog: false,
                institution: {
                    name: "",
                    courses: []
                },
                rules: {
                    name: [
                        v => !!v || 'Nome obrigatório!'
                    ],
                    courseName: [
                        v => !!v || 'Nome obrigatório'
                    ]  ,
                    mps: [
                        v => !!v || 'Obrigatório',
                        v => !isNaN(v) || 'Deve ser Numérico'
                    ]
                },
                headers: [
                    { text: 'Nome', align: 'left', sortable: true, value: 'name' },
                    { text: 'Meses por temporada', align: 'left', sortable: true, value: 'months_per_season' },
                    { text: 'Quantidade de temporadas', align: 'left', sortable: true, value: 'seasons_quantity' },
                    { text: 'Ações', value: 'name', sortable: false }
                ],
                editedItem: {
                    name: '',
                    months_per_season: 0,
                    seasons_quantity: 0,
                },
                defaultItem: {
                    name: '',
                    calories: 0,
                    fat: 0,
                    carbs: 0,
                    protein: 0
                },
                editedIndex: -1,

            }
        },

        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'Novo curso' : 'Editar Curso'
            }
        },

        methods: {
            close () {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save () {
                if (!this.courseIsValid) {
                    sweetalert('Ops', 'Existem erros no formulário?', 'error')
                    return false
                }
                if (this.editedIndex > -1) {
                    Object.assign(this.institution.courses[this.editedIndex], this.editedItem)
                } else {
                    this.institution.courses.push(this.editedItem)
                }
                this.close()
            },

            editItem (item) {
                this.editedIndex = this.institution.courses.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                const index = this.institution.courses.indexOf(item)
                confirm('Você tem certeza que deseja excluir esse curso?') && this.institution.courses.splice(index, 1)
            },

            submit() {
                if (!this.valid) {
                    sweetalert('Ops', 'Existem erros no formulário?', 'error')
                    return false
                }

                axios.post('/api/instituicoes', this.institution)

                this.$router.push('/instituicoes')
            }

        }
    }
</script>

<style scoped>

</style>