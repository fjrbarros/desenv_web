<?php

namespace App\entity;

class Util
{
    public function MsgError($msg = "")
    {
        return strlen($msg) ? '<div class="alert alert-danger""> ' . $msg . '</div>' : "";
    }
}
