<template>
    <div class="messaging">

        <div class="row">

            <div class="col-md-5 pl-0 pr-0 inbox_people">

                <div class="inbox_chat">

                    <h3 v-if="providers.length == 0" class="text-center mt-5">لا توجد محادثات حتي الان</h3>

                    <div v-for="provider in providers"
                         :key="provider.id"
                         :class="['chat_list', activeProvider.id === provider.id? 'active_chat': '']"
                         @click="setActive(provider)"
                    >
                        <div class="chat_people">
                            <div class="chat_img">
                                <img :src="provider.image">
                            </div>
                            <div class="chat_ib">
                                <h5>{{provider.name}}</h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-7 pr-0">

                <div class="mesgs">

                    <div id="messagesList" class="msg_history">

                        <div v-for="(message, index) in allMessages" :class="[message.sender_id === 0? 'outgoing_msg': 'incoming_msg']">

                            <div v-if="message.sender_id !== 0" class="incoming_msg_img">
                                <img :src="activeProvider.image">
                            </div>

                            <div v-if="message.sender_id !== 0" class="received_msg">
                                <div class="received_withd_msg">
                                    <p>{{message.message}}</p>
                                    <span class="time_date">{{message.created_at}}</span>
                                </div>
                            </div>

                            <div v-if="message.sender_id === 0" class="sent_msg">
                                <p>{{message.message}}</p>
                                <span class="time_date">{{message.created_at}}</span>
                            </div>

                        </div>

                    </div>

                    <div class="type_msg pt-3">
                        <div class="input_msg_write">
                            <div class="row">
                                <div class="col-1 pt-2">
                                    <button class="msg_send_btn" type="button" @click="sendMessage()"><i class="fa fa-paper-plane"></i></button>
                                </div>
                                <textarea v-model="message" @keypress.enter="sendMessage" class="col-11 write_msg" rows="5" placeholder="اكتب رسالتك" ></textarea>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

<script>

    export default {

        name: "Chat",

        data() {

            return {
                message: null,
                providers: null,
                activeProvider: null,
                allMessages: [],
            }

        },

        created() {

            this.getProviders();

            Echo.private(`chat.0`)

                .listen('MessageSent', (e) => {

                    this.allMessages.push(e.message);

                    this.getProviders();

                });

        },

        updated() {

            this.messageListScroll();

        },

        watch: {

            activeProvider(val) {
                this.getMessages();
            }

        },

        methods: {

            messageListScroll() {
                var container = document.querySelector("#messagesList");
                var scrollHeight = container.scrollHeight;
                container.scrollTop = scrollHeight;
            },

            getProviders() {

                axios.get('/api/messages/getProviders').then(response => {

                    this.providers = response.data.data;

                    if(this.providers.length > 0){
                        this.activeProvider = this.providers[0];
                    }

                });

            },

            setActive(provider) {

               this.activeProvider = provider;

            },

            getMessages() {

                if(!this.activeProvider){
                    return alert('عفوا قم بإختيار مزود خدمة');
                }

                axios.get('/api/messages/'+this.activeProvider.id+'/getMessages').then(response => {

                    this.allMessages = response.data;

                });

            },

            sendMessage() {

                if(!this.message){
                    return alert('عفوا قم بإدخال الرسالة');
                }

                if(!this.activeProvider){
                    return alert('عفوا قم بتحديد مزود خدمة اولا');
                }

                axios.post('/admin/messages/sendMessage', {
                    sender_id: 0,
                    receiver_id: this.activeProvider.id,
                    message: this.message
                }).then(response => {
                    this.message = null;
                    this.messageListScroll();
                    this.allMessages.push(response.data.message);
                });
            }

        },

    }

</script>

<style scoped>

</style>
