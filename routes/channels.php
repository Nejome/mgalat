<?php

Broadcast::channel('chat.{room_id}', function () {

    return true;

});
