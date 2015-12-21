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
        $settings['example'] = Ninja_Forms()->notification( $id )->get_setting( 'example' );

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
}

new NF_Action_JetpackSubscriptions();
