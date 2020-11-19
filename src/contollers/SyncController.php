<?php

require 'src/services/CsvService.php';
require 'src/services/DeviceService.php';
require 'src/utils/Utils.php';

class SyncController
{

    protected $service;
    protected $csService;

    function __construct() {
        $this->service = new DeviceService();
        $this->csService = new CsvService();
    }

    /**
     * export
     */
    function export_info_to_csv() {
        try {
            $header = [
                'id_name_sensor',
                'last_date_time',
                'value',
                'last_position',
                'battery_level'
            ];
            $devices = $this->service->get_all_devices();
            $ok_devices = Utils::filter_active_devices($devices);
            $temp_arr = array();
            foreach ($ok_devices as $key => $device) {
                $device_rows = Utils::create_csv_rows($devices);
                $temp_arr = array_merge($temp_arr, $device_rows);
            }

            $exported = $this->csService->export_arry_to_csv($temp_arr, CSV_FILE_PATH, $header);
            if($exported) {
                Logger::info("data exported successfully");
            } else {
                Logger::error("something goes wrong with data export");
            }
        } catch (Exception $exception){
            Logger::error("function: export_info_to_csv => ".$exception->getMessage());
        }


    }

}