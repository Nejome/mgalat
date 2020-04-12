<template>
    <div class="messaging">

        <div class="row">

            <div class="col-md-10 m-auto pr-0">

                <div class="mesgs">

                    <div id="messagesList" class="msg_history">

                        <div v-for="(message, index) in allMessages" :class="[message.sender_id === 0? 'outgoing_msg': 'incoming_msg']">

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
                        <div class="input_msg_write row" style="margin: 0 !important;">
                            <div class="col-1 pt-2">
                                <button  class="msg_send_btn" type="button" @click="sendMessage()"><i class="fa fa-paper-plane"></i></button>
                                <img v-if="loading" :src="image" style="position: absolute; width: 50px; height: 50px;">
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

        name: "adminChat",

        props: ['tokenprop', 'roomid', 'imageprop'],

        data() {

            return {
                token: null,
                roomId: null,
                image: null,
                message: null,
                loading: false,
                allMessages: [],
            }

        },

        created() {

            this.token = this.tokenprop;

            this.roomId = this.roomid;

            this.image = this.imageprop;

            this.getMessages();

            Echo.channel(`chat.`+this.roomid)

                .listen('MessageSent', (e) => {

                    this.allMessages.push(e.message);

                });

        },

        updated() {

            this.messageListScroll();

        },

        methods: {

            messageListScroll() {
                var container = document.querySelector("#messagesList");
                var scrollHeight = container.scrollHeight;
                container.scrollTop = scrollHeight;
            },

            getMessages() {

                axios.get('/admin/chats/'+this.roomId+'/getMessages').then(response => {

                    this.allMessages = response.data;

                });

            },

            sendMessage() {

                if(!this.message){
                    return alert('عفوا قم بإدخال الرسالة');
                }

                this.loading = true;

                axios.post('/admin/chats/'+this.roomId+'/sendMessage', {
                    token: this.token,
                    sender_id: 0,
                    receiver_id: 1,
                    message: this.message
                }).then(response => {
                    this.message = null;
                    this.messageListScroll();
                    this.allMessages.push(response.data.message);
                    this.loading = false;
                });

            }

        },

    }
</script>

<style scoped>

</style>
