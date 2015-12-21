<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Action_JetpackSubscriptions extends NF_Notification_Base_Type
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $slug = 'jetpack-subscriptions';



    /**
     * Constructor
     */
    public function __construct()
    {
        if( ! class_exists( 'Jetpack_Subscriptions' ) ){
            add_action( 'admin_notices', array( $this, 'jetpack_subscriptions_module_not_found' ) );
        }

        $this->name = __( 'Jetpack Subscriptions', NF_JetpackSubscriptions::TEXTDOMAIN );

        add_filter( 'nf_notification_types', array( $this, 'register_action_type' ) );
    }


    /**
     * Register Action Type
     *
     * @param $types
     * @return array
     */
    public function register_action_type( $types )
    {
        $types[ $this->slug ] = $this;
        return (array) $types;
    }



    /**
     * Edit Screen
     *
     * @return void
     */
    public function edit_screen( $id = '' )
    {
        $form = Ninja_Forms()->form( $_GET['form_id'] );

        $settings['nf-jps-email-field'] = Ninja_Forms()->notification( $id )->get_setting( 'nf-jps-email-field' );

        include NF_JetpackSubscriptions::$dir . 'includes/templates/action-jetpack-subscriptions.html.php';
    }



    /**
     * Process
     *
     * @param string $id
     * @return void
     */
    public function process( $id = '' )
    {
        //Process Action Here
    }



    /**
     * Jetpack Subscriptions Module Not Found
     */
    public function jetpack_subscriptions_module_not_found()
    {
        $class   = 'error';
        $message = __( 'Jetpack Subscriptions Module Not Found.', 'ninja-forms-jetpack-subscriptions' );
        include NF_JetpackSubscriptions::$dir . 'includes/templates/admin-notice.html.php';
    }
}

new NF_Action_JetpackSubscriptions();
