<?php


Broadcast::channel('chat.{receiver_id}', function ($user) {

    return auth()->check();

});
