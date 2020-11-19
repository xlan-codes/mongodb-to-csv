<?php

require 'src/logger/Logger.php';

class Utils
{

    /**
     * get all devices
     * @param array $arr array with devices
     * @return array devices without DEAD flag
     */
    static function filter_active_devices($arr = array()) {
        try {
            $temp = array();
            foreach ($arr as $key=>$value) {
                if($value['state']['device_state'] != DEAD_STATE)
                    array_push($temp, $value);
            }
            Logger::info("active devices filtered");
            return $temp;
        } catch (Exception $e) {
            Logger::error("error with filter active devices");
        }
        return array();
    }

    /**
     * @param array $messages array with messages
     * @param int $epoch epoch time that we should to compare to get latest message
     * @return mixed|null // return null if epoch time not exist on messages otherwise get message with sensor field
     */
    static function get_latest_message($messages = array(), $epoch=0) {
        $latest_message = null;

        foreach ($messages as $key=>$value) {
            if(!isset($value['time']['epoch']))
                continue;

            if($value['time']['epoch'] == $epoch) {
                $latest_message = $value;
            }
        }
        return $latest_message;

    }

    /**
     * @param $devices all devices that information concerted to csv file
     * @return array array that convert to csv file
     */
    function create_csv_rows($devices) {
        try {
            $temp = array();
            foreach ($devices as $key => $device) {
                try {
                    $last_m = Utils::get_latest_message($device['messages'], $device['last_communication']['epoch']);

                    if(!isset($last_m['data']['env']['values']))
                        continue;
                    $last_message = $last_m['data']['env']['values'];
                    foreach ($last_message as $key=>$value) {
                        $row['id_name_sensor'] = $device['id'].'-'.$device['name'].'-'.$key;
                        $row['last_date_time'] = $device['last_communication']['date'].' '.$device['last_communication']['time'];
                        $row['value'] = $value;
                        $row['last_position'] = $device['last_position'];
                        $row['battery_level'] = $last_m['battery'];
                        array_push($temp, $row);
                    }
                } catch (Exception $e) {
                    Logger::error('function:create_csv_rows => '.$e->getMessage());
                }


            }
            return $temp;
        } catch (Exception $e) {
            Logger::error('function:create_csv_rows => '.$e->getMessage());
            return array();
        }

    }

}