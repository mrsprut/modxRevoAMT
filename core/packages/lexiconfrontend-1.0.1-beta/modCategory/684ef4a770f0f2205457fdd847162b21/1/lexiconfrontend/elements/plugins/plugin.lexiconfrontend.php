<?php

$eventName = $modx->event->name;
switch ($eventName) {
    case 'OnLoadWebDocument':
        $modx->lexicon->load('lexiconfrontend:default');
        $modx->lexicon->load('lexiconfrontend:meta');
        break;
}