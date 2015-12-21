<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Menu_JetpackSubscriptions extends NF_Base_Menu
{
    public $menu_slug = 'ninja-forms-jetpack-subscriptions';

    public function __construct()
    {
        $this->name  = 'jetpack-subscriptions';
        $this->title = __( 'Jetpack Subscriptions', NF_JetpackSubscriptions::TEXTDOMAIN );

        $this->settings = array(
            'example1' => __( 'Example One', NF_JetpackSubscriptions::TEXTDOMAIN ),
            'example2' => __( 'Example Two', NF_JetpackSubscriptions::TEXTDOMAIN ),
        );

        parent::__construct();
    }

    /**
     * Display
     *
     * The default display method.
     */
    public function display()
    {
        $this->tab = ( isset( $_GET['tab'] ) ) ? $_GET['tab'] : '';
        include NF_JetpackSubscriptions::$dir . 'includes/templates/admin-menu.html.php';
    }

    /**
     * Enqueue Styles
     */
    public function enqueue_styles()
    {
        wp_enqueue_style(
        /* Handle       */ 'ninja-forms-jetpack-subscriptions-admin-css',
            /* Source       */ NF_JetpackSubscriptions::$url . '/assets/css/dev/ninja-forms-jetpack-subscriptions-admin.css',
            /* Dependencies */ FALSE,
            /* Version      */ NF_JetpackSubscriptions::VERSION,
            /* In Footer    */ FALSE
        );
    }

    /**
     * Enqueue Scripts
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script(
        /* Handle       */ 'ninja-forms-jetpack-subscriptions-admin-js',
            /* Source       */ NF_JetpackSubscriptions::$url . '/assets/js/min/ninja-forms-jetpack-subscriptions-admin.min.js',
            /* Dependencies */ array( 'jquery' ),
            /* Version      */ NF_JetpackSubscriptions::VERSION,
            /* In Footer    */ TRUE
        );
    }


} // End NF_JetpackSubscriptions_Menu Class

new NF_Menu_JetpackSubscriptions();
