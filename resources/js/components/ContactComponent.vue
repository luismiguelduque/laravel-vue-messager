<template>
    <b-list-group-item  :variant="variant">
        <b-row class="p-2" align-h=center>
            <b-col cols="12" md="3" class="text-center">
                <b-img rounded="circle" blank width="62" height="62" blank-color="#777" alt="img" class="m-1" />
            </b-col>
            <b-col cols="6" align-self="center" class="d-none d-md-block">
                <p class="mb-0">{{ name }}</p>
                <p class="text-muted small mb-1">{{ lastMessage }}</p>
            </b-col>
            <b-col cols="3" align-self="center" class="d-none d-md-block">
                <p class="text-muted small">{{ lastTime }}</p>
            </b-col>
        </b-row>
    </b-list-group-item>
</template>
<script>
    export default{
        props: [
            'variant'
        ],
        data(){
            return {
                name: 'Juan Carlos',
                lastMessage: 'Tú: Hasta pronto',
                lastTime: '2:45 pm',
            };
        },
        mounted(){
            
        }
    }
</script>