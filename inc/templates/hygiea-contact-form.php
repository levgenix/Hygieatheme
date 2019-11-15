<h1><?php bloginfo( 'name' ); ?> Contact Form</h1>
<?php settings_errors(); ?>

<div class="hygiea-container">
    <form method="post" action="options.php" class="hygiea-general-form">
        <?php settings_fields( 'hygiea-contact-options' ); ?>
        <?php do_settings_sections( 'hygiea_theme_contact' ); ?>
        <?php submit_button(); ?>
    </form>
</div>