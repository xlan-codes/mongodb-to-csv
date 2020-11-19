<?php

require 'src/repos/DeviceCollectionRepository.php';

class DeviceService
{
    protected $repository;
    function __construct() {
        $this->repository = new DeviceCollectionRepository();
    }

    /**
     * get all devices
     * @return array array with devices
     */
    function get_all_devices(): array {
        if($this->repository != null)
            return $this->repository->get_devices_array();
        else
            return null;
    }

    /**
     * get all devices by filter
     * @param $filter
     * @return array|null
     */
    function get_devices_filter($filter) {
        if($this->repository != null)
            return $this->repository->get_devices_where(null,null,false);
        else
            return null;
    }


}