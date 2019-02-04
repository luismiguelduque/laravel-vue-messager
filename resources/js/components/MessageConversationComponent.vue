<template>
    <b-media vertical-align="center" class="mb-2" :right-align="writtenByMy" >
        <b-img slot="aside" rounded="circle" blank blank-color="#ccc" width="55" alt="placeholder" />
        <b-card>
            <slot></slot>
        </b-card>
    </b-media>
</template>

<script>
    export default{
        props: {
            writtenByMy: Boolean,
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