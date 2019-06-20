<template>
    <v-container>
        <v-layout column fill-height>
            <h1>Escolha as disciplinas</h1>
            <v-divider class="mb-5"/>

            <v-container fluid>
                <v-layout column>
                    <v-flex xs12>
                        <v-tabs v-model="active" color="primary" dark slider-color="yellow">
                            <v-tab v-for="n in course.seasons_quantity" :key="n" ripple>Temporada {{n}}</v-tab>
                        </v-tabs>

                        <v-card>
                            <v-tabs-items v-model="active">
                                <v-tab-item v-for="n in course.seasons_quantity" :key="n">
                                    <v-flex>
                                        <v-container>
                                            <v-layout row wrap>
                                                <div v-if="getDisciplinesSeason(n).length">
                                                    <v-flex v-for="(discipline, index) in getDisciplinesSeason(n)" @click="toggleDiscipline(discipline)" class="v-card--hover"  :key="discipline.id" xs12 md6 lg4>
                                                        {{ discipline.name }}
                                                    </v-flex>
                                                </div>
                                                <no-data v-else/>
                                            </v-layout>
                                        </v-container>
                                    </v-flex>
                                </v-tab-item>
                            </v-tabs-items>
                        </v-card>
                    </v-flex>


                    <v-flex xs12>
                        <v-toolbar color="primary">
                            <v-toolbar-title>Escolhidos</v-toolbar-title>
                        </v-toolbar>

                        <v-card>
                            <v-container>
                                <v-layout row wrap>
                                    <div v-if="selectedDisciplines.length">
                                        <v-flex v-for="(discipline, index) in selectedDisciplines" @click="toggleDiscipline(discipline)" class="v-card--hover" :class="{selected: discipline.active}"  :key="discipline.id" xs12 md6 lg4>
                                            {{ discipline.name }}
                                        </v-flex>
                                    </div>
                                    <no-data v-else/>
                                </v-layout>
                            </v-container>
                        </v-card>
                    </v-flex>
                    <v-btn
                            absolute
                            dark
                            fab
                            bottom
                            right
                            color="success"
                            class="mb-5"
                            @click="submit"
                    >
                        <v-icon>check</v-icon>
                    </v-btn>
                    <v-dialog v-model="dialog" max-width="500px">
                        <template v-slot:activator="{ on }">
                            <v-btn
                                    absolute
                                    dark
                                    fab
                                    bottom
                                    color="success"
                                    class="mb-5"
                                    v-on="on"
                            >
                                <v-icon>add</v-icon>
                            </v-btn>
                        </template>
                        <v-form v-model="disciplineIsValid" @submit.prevent="save(active + 1)">
                            <v-card>
                                <v-card-title>
                                    <span class="headline">Nova Disciplina</span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container grid-list-md>
                                        <v-layout column>
                                            <v-flex xs12 sm6 md4>
                                                <v-text-field v-model="newDiscipline.name" label="Nome" required :rules="rules.name"/>
                                            </v-flex>
                                        </v-layout>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" flat @click="close">Cancelar</v-btn>
                                    <v-btn color="blue darken-1" type="submit" flat>Salvar</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-form>
                    </v-dialog>
                </v-layout>
            </v-container>
        </v-layout>
    </v-container>
</template>
disciplines: []
<script>
    export default {
        name: "index",
        data() {
            return {
                dialog: false,
                active: 0,
                disciplineIsValid: false,
                course: {

                },
                disciplines: [],
                selectedDisciplines: [],
                newDiscipline: {
                    name: ''
                },
                rules: {
                    name: [
                        v => !!v || 'Nome obrigatório'
                    ]
                }
            }
        },

        methods: {
            getDisciplinesSeason(season) {
                let found = []

                this.disciplines.forEach(discipline => {
                    if (discipline.season === season) {
                        found.push(discipline)
                    }
                })

                return found
            },

            save(season) {
                this.newDiscipline.season = season
                this.newDiscipline.course_id = this.course.id
                axios.post('/api/disciplines', this.newDiscipline).then(r => {
                    this.disciplines.push(this.newDiscipline)
                    this.close()
                })

            },

            close () {
                this.dialog = false
                setTimeout(() => {
                    this.newDiscipline = {}
                }, 300)
            },

            toggleDiscipline(discipline) {
                if (this.disciplines.indexOf(discipline) === -1) {
                    this.disciplines.push(discipline)
                    this.selectedDisciplines.splice(this.selectedDisciplines.indexOf(discipline), 1)
                } else {
                    this.selectedDisciplines.push(discipline)
                    this.disciplines.splice(this.disciplines.indexOf(discipline), 1)
                }

            },


            submit() {
                const dids = []

                this.selectedDisciplines.forEach(d => {
                    dids.push(d.id)
                })

                axios.post('/api/disciplines/subscript', dids).then(r => {
                    swal('Inscrito!', 'Inscrições feitas com sucesso!', 'success')
                    setTimeout(() => {
                        this.$router.push('/disciplinas')
                    }, 1500)
                })
            }
        },


        mounted() {
            axios.get('/api/courses/'+this.$route.query.courseId).then(r => {
                this.course = r.data
                this.disciplines = r.data.disciplines
            })
        }
    }
</script>

<style scoped>

    .selected {
        color: #8bc34a;
    }
</style>