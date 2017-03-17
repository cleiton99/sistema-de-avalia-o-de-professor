<?php

class MSG {

    const ALERT_SUCCESS = "alert-success";
    const ALERT_INFO = "alert-info";
    const ALERT_WARNING = "alert-warning";
    const ALERT_DANGER = "alert-danger";

    public static function getAlertMensagemClose($classe, $message) {
        $mod = "";
        if ($message != null) {
            $mod .= "<div class='alert $classe alert-dismissible' role='alert'>";
            $mod .= "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            $mod .= $message;
            $mod .= "</div>";
        }
        return $mod;
    }

    public static function getAlertMensagemDefault($classe) {
        $mod = "<div class='alert $classe' role='alert'>";
        return $mod;
    }

}
