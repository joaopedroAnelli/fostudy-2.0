<template>
    <v-container>
        <v-layout column fill-height>


            <h1>Nova Aula</h1>
            <v-divider class="mb-5"/>


            <v-form v-model="valid">
                <v-container>
                    <v-layout column>
                        <v-flex xs12 sm6 md6 lg3>
                            <v-select
                                    :items="teachers"
                                    label="Professor"
                            ></v-select>
                        </v-flex>

                        <v-flex xs12 sm6 md6 lg3>
                            <v-select
                                    :items="disciplines"
                                    label="Disciplina"
                            ></v-select>
                        </v-flex>

                        <v-flex xs12 sm6 md6 lg3>
                            <v-switch
                                    v-model="classs.absence"
                                    label="Presença"
                            ></v-switch>
                        </v-flex>



                        <v-flex xs12 sm12 md3>
                            <v-date-picker class="mb-5 mr-5" v-model="date"  :reactive="true"></v-date-picker>
                            <v-time-picker v-model="time"></v-time-picker>
                        </v-flex>
                        <v-flex>
                            <v-card style="height: 200px; background-color: transparent">
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
    import moment from 'moment'

    export default {
        name: "index",
        data () {
            return {
                valid: false,
                classs: {
                    starts_at: null,
                    discipline_id: null,
                    teacher_id: null,
                    absence: false,
                },
                time: moment().format('HH:mm'),
                date: moment().format('YYYY-MM-DD'),
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
                teachers: [
                    "Luis Evangelista",
                    "Luis Fernando"
                ],
                disciplines: [
                    "WEB",
                    "Lab Eng Software"
                ]

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
                    Object.assign(this.class.courses[this.editedIndex], this.editedItem)
                } else {
                    this.class.courses.push(this.editedItem)
                }
                this.close()
            },

            editItem (item) {
                this.editedIndex = this.class.courses.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                const index = this.class.courses.indexOf(item)
                confirm('Você tem certeza que deseja excluir esse curso?') && this.class.courses.splice(index, 1)
            },

            submit() {
                sweetalert('Salvo', 'Aula salva com sucesso!', 'success').then(r => {
                    this.$router.push('/dashboard')
                })
            }

        }
    }
</script>

<style scoped>

</style>