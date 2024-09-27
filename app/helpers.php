<?php

if (!function_exists('tutorId')) {
    function tutorId() {
        return auth()->check() ? auth()->user()->tutor->id : null;
    }
}

if (!function_exists('tutor')) {
    function tutor() {
        return auth()->check() ? auth()->user()->tutor : null;
    }
}
