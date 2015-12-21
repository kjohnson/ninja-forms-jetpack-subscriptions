<div class="wrap">

    <h2><?php _e( 'Ninja Forms', 'ninja-forms' ); ?> <?php _e( 'Jetpack Subscriptions', NF_JetpackSubscriptions::TEXTDOMAIN ); ?></h2>

    <p>Use a custom Ninja Form to allow users to subscribe to your posts and comments and receive notifications via email. (Requires Jetpack by WordPress.com, with the Jetpack Subscriptions module, to be installed and active)</p>

    <?php include NF_JetpackSubscriptions::$dir . 'includes/templates/admin-menu-toolbar.html.php'; ?>

    <?php if( '' == $tab )
        include NF_JetpackSubscriptions::$dir . 'includes/templates/admin-menu-settings.html.php';
    ?>

</div>