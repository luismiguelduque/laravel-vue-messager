<template>
    <b-form class="my-3 mx-2">
        <b-form-input type="text" class="text-center"
            id="search" name="search" v-model="querySearch"
            required autofocus
            placeholder="Buscar contacto...">
        </b-form-input>
    </b-form>
</template>

<script>
    export default {
        computed:{
            querySearch: {
                get(){
                    return this.$store.state.querySearch;
                },
                set(value){
                    this.$store.commit('updateQuerySearch', value);
                }
            },
            selectedConversation(){
                return this.$store.state.selectedConversation;
            }
        }
    }
</script>

<style>

</style>
