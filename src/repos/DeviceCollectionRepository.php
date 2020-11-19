<?php
require 'entities/DevicesCollection.php';
require 'entities/Last_communication.php';
require 'entities/State.php';

class DeviceCollectionRepository {

    /**
     * @return \Mongolid\Cursor\Cursor
     */
    function get_all_devices_cursor(): \Mongolid\Cursor\Cursor {
        return DevicesCollection::all();
    }

    /**
     * @return array
     */
    function get_devices_array(): array {
        $devices = DevicesCollection::all();
        return $devices->toArray();
    }

    /**
     *
     */
    function get_devices_first() {

    }

    /**
     * @param array $query
     * @param array $projection
     * @param bool $useCache
     * @return array
     */
    function get_devices_where(array $query = [],
                               array $projection = [],
                               bool $useCache = false
    ): array {
        $devices = DevicesCollection::where($query, $projection, $useCache);
        return $devices->all();
    }

}