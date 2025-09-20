<?php
namespace App\Helpers;

Class CustomMessage {
    public static function success($title, $message) {
        return [
            'type' => 'success',
            'title' => $title,
            'message' => $message,
        ];
    }

    public static function error($title, $message) {
        return [
            'type' => 'error',
            'title' => $title,
            'message' => $message,
        ];
    }

    public static function info($title, $message) {
        return [
            'type' => 'info',
            'title' => $title,
            'message' => $message,
        ];
    }

    public static function warning($title, $message) {
        return [
            'type' => 'warning',
            'title' => $title,
            'message' => $message,
        ];
    }
}