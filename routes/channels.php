<?php

Broadcast::channel('chat.{receiver_id}', function () {

    return auth()->check();

});
