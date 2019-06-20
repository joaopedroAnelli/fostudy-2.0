<template>
    <v-container>
        <v-layout column fill-height>


            <h1>Nova Prova</h1>
            <v-divider class="mb-5"/>


            <v-form v-model="valid" @submit.prevent="submit">
                <v-container>
                    <v-layout column>

                        <v-flex xs12 sm6 md6 lg3>
                            <v-select
                                    v-model="test.discipline_id"
                                    :items="disciplines"
                                    item-text="name"
                                    item-value="id"
                                    label="Disciplina"
                                    :rules="rules.discipline_id"
                            ></v-select>
                        </v-flex>



                        <v-flex xs12 sm12 md3>
                            <v-toolbar-title>Quando é a prova?</v-toolbar-title>
                            <v-date-picker class="mb-5 mr-5" v-model="date"  :reactive="true"></v-date-picker>
                            <v-time-picker v-model="time"></v-time-picker>
                        </v-flex>
                        <v-flex>
                            <v-card style="height: 200px; background-color: transparent; box-shadow: unset">
                                <v-btn
                                        @click="$router.push('/provas')"
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
                                        type="submit"
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
                test: {
                    discipline_id: null,
                    starts_at: ''
                },
                time: moment().format('HH:mm'),
                date: moment().format('YYYY-MM-DD'),
                rules: {
                    name: [
                        v => !!v || 'Nome obrigatório!'
                    ],
                    discipline_id: [
                        v => !!v || 'Disciplina obrigatória!'
                    ]
                },
                disciplines: [
                ]

            }
        },

        methods: {
            submit() {
                if (this.valid) {
                    this.test.starts_at = this.date + ' ' + this.time + ':00'
                    axios.post('/api/tests', this.test).then(r => {
                        sweetalert('Salvo', 'Prova cadastrada com sucesso!', 'success').then(r => {
                            this.$router.push('/provas')
                            location.reload()
                        })
                    })
                } else {
                    sweetalert('Ops', 'Verifique os Campos', 'error')
                }
            }

        },

        mounted() {
            axios.get('/api/disciplines').then(r => {
                this.disciplines = r.data
            })
        }
    }
</script>

<style scoped>

</style>