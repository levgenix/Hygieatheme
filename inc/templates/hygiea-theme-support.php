<h1><?php bloginfo( 'name' ); ?> Support</h1>
<?php settings_errors(); ?>

<div class="hygiea-container">
    <form method="post" action="options.php" class="hygiea-general-form">
        <?php settings_fields( 'hygiea-theme-support' ); ?>
        <?php do_settings_sections( 'hygiea_theme_options' ); ?>
        <?php submit_button(); ?>
    </form>
</div>


