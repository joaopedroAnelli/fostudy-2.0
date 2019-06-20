<template>
    <div style="display: none;"></div>
</template>

<script>
    export default {
        name: "ReceiveUser",
        props: {
            user: {
                type: String,
                required: true
            }
        },

        mounted() {
            localStorage.setItem('user', this.user)
        }
    }
</script>

<style scoped>

</style>