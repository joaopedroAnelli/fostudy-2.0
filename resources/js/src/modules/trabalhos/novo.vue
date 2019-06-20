<template>
    <v-container>
        <v-layout column fill-height>


            <h1>Novo Trabalho</h1>
            <v-divider class="mb-5"/>


            <v-form v-model="valid" @submit.prevent="submit">
                <v-container>
                    <v-layout column>

                        <v-flex xs12 sm6 md6 lg3>
                            <v-text-field
                                    v-model="homework.name"
                                    :rules="rules.name"
                                    label="Nome"
                                    required
                            />
                        </v-flex>

                        <v-flex xs12 sm6 md6 lg3>
                            <v-select
                                    v-model="homework.discipline_id"
                                    :items="disciplines"
                                    item-text="name"
                                    item-value="id"
                                    label="Disciplina"
                                    :rules="rules.discipline_id"
                            ></v-select>
                        </v-flex>



                        <v-flex xs12 sm12 md3>
                            <v-toolbar-title>Pra quando?</v-toolbar-title>
                            <v-date-picker class="mb-5 mr-5" v-model="date"  :reactive="true"></v-date-picker>
                            <v-time-picker v-model="time"></v-time-picker>
                        </v-flex>
                        <v-flex>
                            <v-card style="height: 200px; background-color: transparent; box-shadow: unset">
                                <v-btn
                                        @click="$router.push('/trabalhos')"
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
                homework: {
                    discipline_id: null,
                    name: '',
                    delivery_at: ''
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
                    this.homework.delivery_at = this.date + ' ' + this.time + ':00'
                    axios.post('/api/homeworks', this.homework).then(r => {
                        sweetalert('Salvo', 'Trabalho salvo com sucesso!', 'success').then(r => {
                            this.$router.push('/dashboard')
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