<template>
    <v-card>
        <v-container>
            <v-layout row>
                <v-flex xs8 md10>
                    <v-card-title>
                        <v-layout column>
                            <p class="mb-1">{{ name }}</p>
                            <h1> {{ data }}</h1>
                        </v-layout>
                    </v-card-title>
                </v-flex>
                <v-flex xs4 md2>

                </v-flex>
            </v-layout>
        </v-container>
    </v-card>
</template>

<script>
    export default {
        name: "LittleIndicator",
        props: ['name', 'data']
    }
</script>

<style scoped>

</style>