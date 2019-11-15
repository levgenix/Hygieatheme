<h1><?php bloginfo( 'name' ); ?> Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields( 'hygiea-settings-group' ); ?>
    <?php do_settings_sections( 'hygiea_theme' ); ?>
    <?php submit_button(); ?>
</form>