<template>
    <b-row class="h-100">
        <b-col cols="8">
            <b-card no-body
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversación activa"
                class="h-100">

                <b-card-body class="messages-container">
                    <message-conversation-component
                        v-for="message in messages"
                        :key="message.id"
                        :image="message.written_by_me ? myImage : contactImage"
                        :written-by-my="message.written_by_me">
                        {{ message.message }}
                    </message-conversation-component>
                </b-card-body>

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
            <b-img rounded="circle" :src="contactImage" width="62" height="62" alt="img" class="m-1" />
            <p>{{ contactName }}</p>
            <hr>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<style>
    .messages-container{
        max-height: calc(100vh - 63px);
        overflow-y: auto;
    }
</style>

<script>
    export default{
        props:{
            contactId: Number,
            contactName: String,
            contactImage: String,
            messages: Array,
            myImage: String
        },
        data(){
            return {
                newMessage: ''
            }
        },
        mounted(){

        },
        methods:{
            postMessage(){
                const params = {
                    recipent_id: this.contactId,
                    message: this.newMessage
                }
                axios.post('/api/messages', params)
                .then((response) =>{
                    if(response.data.success){
                        this.newMessage = '';
                        const message = response.data.message;
                        message.written_by_me = true;
                        this.$emit('messageCreated', message);
                    }
                });
            },
            scrollToBottom(){
                const el = document.querySelector('.messages-container');
                el.scrollTop = el.scrollHeight;
            }
        },
        updated(){
            this.scrollToBottom()
        }
    }
</script>