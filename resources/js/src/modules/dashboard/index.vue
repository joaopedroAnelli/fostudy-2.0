<template>
    <v-container>
        <v-layout row wrap>
            <v-flex lg4 md6 xs12 v-for="(indicator, index) in dashData.indicators" :key="index">
                <little-indicator  :name="indicator.name" :data="indicator.data"/>
            </v-flex>
        </v-layout>
        <v-layout fill-height row wrap>
            <v-flex xs12 md6>
                <v-card>
                    <v-card-title>
                        <h2>Faltas</h2>
                    </v-card-title>
                    <v-divider/>
                    <v-list>
                        <template>
                            <absence v-for="(absence, index) in dashData.absences" :key="index" :data="absence"/>
                        </template>
                    </v-list>
                </v-card>

            </v-flex>

            <v-flex md3>

            </v-flex>

            <v-flex md3>

            </v-flex>
        </v-layout>

    </v-container>
</template>

<script>
    import LittleIndicator from './components/LittleIndicator'
    import Absence from "./components/Absence";


    export default {
        name: "index",
        components: {
            LittleIndicator,
            Absence
        },
        data: function () {
            return {
                dashData: {
                    indicators: []
                }
            }
        },

        mounted() {
            axios.get('/api/dashboard').then(r => {
                this.dashData = r.data
            })
        }
    }
</script>

<style scoped>

</style>