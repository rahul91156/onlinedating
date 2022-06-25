<?php
Class Profile extends Theme {
    public static $page_data = array('title' => 'profile');
    public static $partial = 'profile';
    public static function init_data() {
        global $config;
        parent::init_data();
        if (isset(self::$page_data['title']) && self::$page_data['title'] !== '') {
            parent::$data['title'] = __('Profile') . ' . ' . $config->site_name;
        }
        parent::$data['name'] = self::$partial;
    }
    public static function show($partial = '') {
        global $config;
        self::init_data();
        if (!empty(route(1))) {
            $user      = userData(Secure(substr(route(1), 1)), array(
                'first_name',
                'last_name',
                'username'
            ));
            $full_name = $user->first_name . ' ' . $user->last_name;
            if ($full_name == ' ') {
                $full_name = $user->username;
            }
            parent::$data['title'] = $full_name . ' ' . self::$page_data['title'] . ' . ' . $config->site_name;
            parent::show(self::$partial);
        } else {
            header('location: ' . $config->uri);
            exit();
        }
    }
}