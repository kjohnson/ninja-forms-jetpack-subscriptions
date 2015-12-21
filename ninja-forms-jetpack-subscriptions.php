<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
Plugin Name: Ninja Forms - Jetpack Subscriptions
Plugin URI: http://kylebjohnson.me
Description: Use a custom Ninja Form to allow users to subscribe to your posts and comments and receive notifications via email. (Requires Jetpack by WordPress.com, with the Jetpack Subscriptions module, to be installed and active)
Version: 0.0.1

Author: Kyle B. Johnson
Author URI: http://kylebjohnson.me

Copyright 2015 Kyle B. Johnson.
*/

if( ! class_exists( 'NF_Base_Menu' ) ) {
    require_once 'classes/menu.class.php';
}
require_once 'includes/admin/menu.php';

/**
 * Class NF_JetpackSubscriptions
 */
class NF_JetpackSubscriptions
{
    const VERSION = '0.0.1';

    const TEXTDOMAIN = 'ninja-forms-jetpack-subscriptions';

    /**
     * Plugin Directory
     *
     * @var string $dir
     */
    public static $dir = '';

    /**
     * Plugin URL
     *
     * @var string $url
     */
    public static $url = '';

    /**
     * Ninja Forms Extension Updater
     *
     * @var NF_Extension_Updater
     */
    public $NF_Extension_Updater;


    /**
     * Constructor
     */
    public function __construct()
    {
        self::$dir = plugin_dir_path( __FILE__ );

        self::$url = plugin_dir_url( __FILE__ );

        add_action( 'plugins_loaded', array( $this, 'ninja_forms_includes' ) );
    }



    /*
    * Public Methods
    */

    /**
     * Ninja Forms Includes
     *
     * Include plugin files for use in Ninja Forms
     */
    public function ninja_forms_includes()
    {
        require_once self::$dir . 'includes/actions/jetpack-subscriptions.php';
    }

    /**
     * Extension Setup License
     *
     * Register with the Ninja Forms licensing system through Easy Digital Downloads
     */
    public function ninja_forms_extension_setup_license()
    {
        if ( class_exists( 'NF_Extension_Updater' ) ) {
            $this->NF_Extension_Updater = new NF_Extension_Updater( 'JetpackSubscriptions', self::VERSION, 'Kyle B. Johnson', __FILE__, 'jetpack-subscriptions' );
        }
    }



    /*
     * Private Methods
     */

    //Add private methods here
}

new NF_JetpackSubscriptions();