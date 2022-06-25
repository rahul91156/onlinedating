<?php
Class Steps extends Theme {
    public static $page_data = array('title' => 'Profile steps');
    public static $partial = 'steps';
    public static function init_data() {
        global $config;
        parent::init_data();
        if (isset(self::$page_data['title']) && self::$page_data['title'] !== '') {
            parent::$data['title'] = ucfirst(__('Profile steps')) . ' . ' . $config->site_name;
        }
        parent::$data['name'] = self::$partial;
    }
    public static function show($partial = '') {
        global $db;
        self::init_data();
        if (isset($_SESSION['JWT'])) {
            $is_login = $db->where('web_token', $_SESSION['JWT']->web_token)->getOne('users');
            if ($is_login['start_up'] == 3) {
                header('location: ' . self::Config()->uri);
                exit();
            }
        }
        parent::show(self::$partial);
    }
}