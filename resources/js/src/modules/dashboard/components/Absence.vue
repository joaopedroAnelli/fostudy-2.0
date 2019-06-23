<template>
    <div>
        <v-subheader
        >
            {{data.discipline.name}} {{data.absences}}/{{data.count}}
        </v-subheader>

        <v-divider
        ></v-divider>
    </div>
</template>

<script>
    export default {
        name: "Absence",
        props: {
            data: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>