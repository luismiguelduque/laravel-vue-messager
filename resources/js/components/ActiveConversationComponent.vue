<template>
    <b-row class="h-100">
        <b-col cols="8">
            <b-card 
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversación activa"
                class="h-100">

                <message-conversation-component 
                    v-for="message in messages" 
                    :key="message.id" 
                    :written-by-my="message.written_by_my">
                    {{ message.message }}
                </message-conversation-component>

                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="off">
                        <b-input-group>
                            <b-form-input type="text" class="text-center"
                                id="message" name="message"
                                v-model="newMessage"
                                placeholder="Escribe un mensaje...">
                            </b-form-input>

                            <b-input-group-append>
                                <b-button type="submit" variant="primary"> Enviar </b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </div> 
                        
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img rounded="circle" blank width="62" height="62" blank-color="#777" alt="img" class="m-1" />
            <p>Juan Carlos</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>
<script>
    export default{
        data(){
            return {
                messages: [],
                newMessage: ''
            }
        },
        mounted(){
            this.getMessages();
        },
        methods:{
            getMessages() {
                axios.get('/api/messages').then((response) =>{
                    this.messages = response.data
                }); 
            },
            postMessage(){
                const params = {
                    recipent_id: 2,
                    message: this.newMessage
                }
                axios.post('/api/messages', params)
                .then((response) =>{
                    if(response.data.success){
                        this.newMessage = '';
                        this.getMessages();
                    }else{

                    }
                });
            }
        }
    }
</script>