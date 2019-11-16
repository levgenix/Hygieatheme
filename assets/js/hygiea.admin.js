jQuery(document).ready(function($) {

    let mediaUploader;

    $('#upload-button').on('click', (e) => {
        e.preventDefault();
        if ( !mediaUploader ) {
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose a Profile Picture',
                button: {
                    text: 'Choose Picture'
                },
                multiple: false
            });

            mediaUploader.on('select', () => {
                attachment= mediaUploader.state().get('selection').first().toJSON();
                $('#profile-picture').val(attachment.url);
                $('#profile-picture-preview').attr('src', attachment.url);
            });
        }

        mediaUploader.open();
    });

    $('#remove-picture').on('click', (e) => {
        e.preventDefault();
        let answer = confirm("Are you sure you want remove your Profile Picture?");
        if ( answer == true) {
            $('#profile-picture').val('');
            $('.hygiea-general-form').submit();
        }
        return;
    });

});