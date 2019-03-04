<template>
    <b-container fluid style="height: calc(100vh - 120px);">
        <b-row no-gutters class="h-100">
            <b-col cols="4">
                <b-form class="my-3 mx-2">
                    <b-form-input type="text" class="text-center"
                        id="search" name="search" v-model="querySearch"
                        required autofocus
                        placeholder="Buscar contacto...">
                    </b-form-input>
                </b-form>
                <contact-list-component
                    @conversationSelected="changeActiveConversation($event)"
                    :conversations="conversationsFiltered">

                </contact-list-component>
            </b-col>
            <b-col cols="8">
                <active-conversation-component
                    v-if="selectedConversation"
                    :contact-id="selectedConversation.contact_id"
                    :contact-name="selectedConversation.contact_name"
                    :contact-image="selectedConversation.contact_image"
                    :my-image="myImageUrl"
                    :messages="messages"
                    @messageCreated="addMessage($event)">
                </active-conversation-component>
            </b-col>
        </b-row>
    </b-container>
</template>

<<script>
    export default {
        props:{
            user: Object
        },
        data(){
            return {
                selectedConversation: null,
                messages: [],
                conversations: [],
                querySearch:''
            }
        },
        mounted(){
            this.getConversations();
            Echo.private(`users.${this.user.id}`)
            .listen('MessageSent', (data)=>{
                const message = data.message;
                message.written_by_me = false;
                this.addMessage(message);
            });

            Echo.join(`messenger`)
            .here((users) => {
                users.forEach((user)=>this.changeStatus(user, true));
            })
            .joining((user) => {
                this.changeStatus(user, true);
            })
            .leaving(
                user => this.changeStatus(user, false)
            );
        },
        methods: {
            changeActiveConversation(conversation){
                this.selectedConversation = conversation;
                this.getMessages();
            },
            getMessages() {
                axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`).then((response) =>{
                    this.messages = response.data
                });
            },
            getConversations(){
                axios.get(`/api/conversations`).then((response)=>{
                    this.conversations = response.data;
                });
            },
            addMessage(message){
                const conversation = this.conversations.find((conversation)=>{
                    return conversation.contact_id == message.sender_id || conversation.contact_id == message.recipent_id;
                });
                const author = (this.user.id === message.sender_id) ? 'Tu' : conversation.contact_name ;
                conversation.last_message = `${author}: ${message.message}`;
                conversation.last_message_time = message.created_at;

                if(this.selectedConversation.contact_id == message.sender_id || this.selectedConversation.contact_id == message.recipent_id){
                    this.messages.push(message);
                }
            },
            changeStatus(user, status){
                const index = this.conversations.findIndex((conversation) => {
                    return conversation.contact_id == user.id;
                });
                if(index >= 0){
                    this.$set(this.conversations[index], 'online', status);
                }
            }
        },
        computed:{
            conversationsFiltered(){
                return this.conversations.filter((conversation)=>{
                    return conversation.contact_name.toLowerCase().includes(this.querySearch.toLowerCase());
                });
            },
            myImageUrl(){
                return `/users/${this.user.image}`;
            }
        }
    }
</script>>