<h1><?php bloginfo( 'name' ); ?> Options</h1>
<?php settings_errors(); ?>

<div class="hygiea-container">
    <div class="hygiea-sidebar-preview">
        <div class="hygiea-sidebar">
            <h2 class="hygiea-user-name"><?php echo esc_attr( join( " ", array( get_option( 'first_name' ), get_option( 'last_name' ) ) ) ); ?></h2>
            <p class="hygiea-user-description"><?php echo esc_attr( get_option( 'user_description' ) ) ?></p>
            <div class="icons-wrapper">

            </div>
        </div>
    </div>
    <form method="post" action="options.php" class="hygiea-general-form">
        <?php settings_fields( 'hygiea-settings-group' ); ?>
        <?php do_settings_sections( 'hygiea_theme' ); ?>
        <?php submit_button(); ?>
    </form>
</div>


