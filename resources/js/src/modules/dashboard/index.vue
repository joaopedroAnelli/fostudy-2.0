<template>
    <v-container>
        <v-layout row wrap>
            <v-flex lg3 md6 xs12 v-for="indicator in indicators" :key="indicators.indexOf(indicator)">
                <little-indicator  :name="indicator.name" :data="indicator.data"/>
            </v-flex>
        </v-layout>
        <v-layout fill-height row wrap>
            <v-flex xs12 md6>
                <v-card>
                    <v-card-title>
                        <h2>Presenças</h2>
                    </v-card-title>
                    <v-divider/>
                    <v-list>
                        <template>
                            <v-subheader
                            >
                                Tete
                            </v-subheader>

                            <v-divider
                            ></v-divider>

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


    export default {
        name: "index",
        components: {
            LittleIndicator
        },
        data() {
            return {
                indicators: [
                    {
                        name: 'Semanas',
                        data: '20/52'
                    },
                    {
                        name: 'Trabalhos Ativos',
                        data: '5'
                    },
                    {
                        name: 'Provas na Semana',
                        data: '3'
                    },
                    {
                        name: 'Mais Atenção',
                        data: 'WEB'
                    },
                ]
            }
        }
    }
</script>

<style scoped>

</style>