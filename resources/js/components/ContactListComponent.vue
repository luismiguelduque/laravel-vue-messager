<template>
    <b-list-group>
        <b-form class="my-3 mx-2">
            <b-form-input type="text" class="text-center"
                id="search" name="search"
                required autofocus
                placeholder="Buscar contacto...">
            </b-form-input>
        </b-form>
        <contact-component variant="dark"></contact-component>
        <contact-component variant="primary"></contact-component>
        <contact-component variant="secondary"></contact-component>
    </b-list-group>
</template>
<script>
    export default{
        data(){
            return {
                test: true
            }
        },
        mounted(){
            
        }
    }
</script>