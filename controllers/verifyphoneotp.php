<?php
Class Verifyphoneotp extends Theme {
    public static $page_data = array('title' => 'SMS code verification');
    public static $partial = 'verifyphoneotp';
    public static function init_data() {
        global $config;
        parent::init_data();
        if (isset(self::$page_data['title']) && self::$page_data['title'] !== '') {
            parent::$data['title'] = ucfirst(__('SMS code verification')) . ' . ' . $config->site_name;
        }
        parent::$data['name'] = self::$partial;
    }
    public static function show($partial = '') {
        self::init_data();
        parent::show(self::$partial);
    }
}