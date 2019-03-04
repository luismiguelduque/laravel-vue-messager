<template>
    <b-media vertical-align="center" class="mb-2" :right-align="writtenByMy" >
        <b-img :src="image" slot="aside" rounded="circle" width="55" height="55" alt="placeholder" />
        <b-card>
            <slot></slot>
        </b-card>
    </b-media>
</template>

<script>
    export default{
        props: {
            writtenByMy: Boolean,
            image: String
        },
        data(){
            return {
                message: "Test message"
            };
        },
        mounted(){

        }
    }
</script>