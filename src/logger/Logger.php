<?php


class Logger
{
    /**
     * init logers
     * @return \Katzgrau\KLogger\Logger
     */
    static function init() {
        $logger = new Katzgrau\KLogger\Logger(LOGGER_FOLDER);
        return $logger;
    }

    static function info($message) {
        $logger = Logger::init();
        $logger->info($message);
    }

    static function warn($message) {
        $logger = Logger::init();
        $logger->warning($message);
    }

    static function error($message) {
        $logger = Logger::init();
        $logger->error($message);
    }
}

