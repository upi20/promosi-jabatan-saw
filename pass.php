<?php
echo (substr(password_hash(
    "1234",
    PASSWORD_BCRYPT,
    array(
        'cost' => 10
    )
), 7));
