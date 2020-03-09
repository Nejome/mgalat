<template>
    <div class="messaging">

        <div class="row">

            <div class="col-md-10 m-auto pr-0">

                <div class="mesgs">

                    <div id="messagesList" class="msg_history">

                        <div v-for="(message, index) in allMessages" :class="[message.sender_id === 1? 'outgoing_msg': 'incoming_msg']">

                            <div v-if="message.sender_id !== 1" class="incoming_msg_img">
                                الادارة
                            </div>

                            <div v-if="message.sender_id !== 1" class="received_msg">
                                <div class="received_withd_msg">
                                    <p>{{message.message}}</p>
                                    <span class="time_date">{{message.created_at}}</span>
                                </div>
                            </div>

                            <div v-if="message.sender_id === 1" class="sent_msg">
                                <p>{{message.message}}</p>
                                <span class="time_date">{{message.created_at}}</span>
                            </div>

                        </div>

                    </div>

                    <div class="type_msg pt-3">
                        <div class="input_msg_write row" style="margin: 0 !important;">
                            <div class="col-1 pt-2">
                                <button class="msg_send_btn" type="button" @click="sendMessage()"><i class="fa fa-paper-plane"></i></button>
                            </div>
                            <div class="col-11">
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

        name: "clientChat",

        props: ['tokenprop'],

        data() {

            return {
                token: null,
                message: null,
                providers: null,
                activeProvider: null,
                allMessages: [],
            }

        },

        created() {

            this.token = this.tokenprop;

            this.getMessages();

            /*Echo.private(`chat.0`)

                .listen('MessageSent', (e) => {

                    this.allMessages.push(e.message);

                    this.getProviders();

                });*/

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

            getMessages() {

                axios.get('/support/'+this.token+'/getChatMessages').then(response => {

                    console.log(response.data);

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
