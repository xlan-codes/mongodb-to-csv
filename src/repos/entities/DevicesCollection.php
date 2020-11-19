<?php


class DevicesCollection extends Mongolid\ActiveRecord {
    protected $collection = 'devices_collection';
    public $_id; //String
    public $id; //String
    public $name; //String
    public $last_communication; //Last_communication
    public $state; //State
    public $messages;  //array
    public $last_position;
    public $last_message;
    public $last_battery;
    public $last_button;
    public $last_gateway_id;
    public $updated_at; //Date
    public $created_at; //Date
}