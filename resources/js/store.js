import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        messages: [],
        conversations: [],
        newMessage: '',
        selectedConversation: null,
        querySearch: '',
        user: null
    },
    mutations: {
        setUser(state, user){
            state.user = user;
        },
        newMessagesList(state, messages){
            state.messages = messages;
        },
        addMessage(state, message){
            const conversation = state.conversations.find((conversation)=>{
                return conversation.contact_id == message.sender_id || conversation.contact_id == message.recipent_id;
            });
            const author = (state.user.id === message.sender_id) ? 'Tu' : conversation.contact_name ;
            conversation.last_message = `${author}: ${message.message}`;
            conversation.last_message_time = message.created_at;

            if(state.selectedConversation.contact_id == message.sender_id || state.selectedConversation.contact_id == message.recipent_id){
                state.messages.push(message);
            }
        },
        selectConversation(state, conversation){
            state.selectedConversation = conversation;
        },
        updateQuerySearch(state, value){
            state.querySearch = value;
        },
        newConversationsList(state, conversations){
            state.conversations = conversations
        }
    },
    actions:{
        getMessages(context, conversation) {
            axios.get(`/api/messages?contact_id=${conversation.contact_id}`)
            .then(
                response => {
                    context.commit('selectConversation', conversation)
                    context.commit('newMessagesList', response.data)
                }
            );
        },
        getConversations(context){
            axios.get(`/api/conversations`).then((response)=>{
                context.commit('newConversationsList', response.data)
            });
        },
        postMessage(context, newMessage){
            const params = {
                recipent_id: context.state.selectedConversation.contact_id,
                message: newMessage
            }
            axios.post('/api/messages', params)
            .then((response) =>{
                if(response.data.success){
                    newMessage = '';
                    const message = response.data.message;
                    message.written_by_me = true;
                    context.commit('addMessage', message);
                }
            });
        }
    },
    getters:{
        conversationsFiltered(state){
            return state.conversations.filter((conversation)=>{
                return conversation.contact_name.toLowerCase().includes(state.querySearch.toLowerCase());
            });
        },
    }
});