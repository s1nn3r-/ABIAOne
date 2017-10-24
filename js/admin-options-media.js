jQuery( document ).ready( function( $ ) {

  jQuery('.icon-remove').on('click', function( event ){

    var remove_id = jQuery(this).attr('data-id');
    event.preventDefault();
    $( '#image-preview-' + remove_id ).attr( 'src', '' ).css( 'width', 'auto' );
    $( '#image_attachment_id_' + remove_id ).val( '' );
    jQuery(this).closest('.image-preview-wrapper').css("display","none");
    jQuery(this).closest('td').find('.upload_image_button').css("display", "block");
  });
  // Uploading files
  var file_frame;
  var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
  //var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
  var set_to_post_id = "";
  var button_id = "";
  var preview = "";
  var button_add ="";
  jQuery('.upload_image_button').on('click', function( event ){
    //show close button
    preview = jQuery(this).closest('td').find('.image-preview-wrapper');
    button_add = jQuery(this).closest('td').find('.upload_image_button');
    //Get index
    button_id = jQuery(this).attr('id');

    event.preventDefault();
    // If the media frame already exists, reopen it.
    if ( file_frame ) {
      // Set the post ID to what we want
      file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
      // Open frame
      file_frame.open();
      return;
    } else {
      // Set the wp.media post id so the uploader grabs the ID we want when initialised
      wp.media.model.settings.post.id = set_to_post_id;
    }
    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: 'Select a image to upload',
      button: {
        text: 'Use this image',
      },
      library: { // remove these to show all
        type: 'image',
      },
      multiple: false	// Set to true to allow multiple files to be selected
    });
    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      preview.css("display","block");
      button_add.css("display", "none");
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();
      // Do something with attachment.id and/or attachment.url here
      $( '#image-preview-' + button_id ).attr( 'src', attachment.url ).css( 'width', 'auto' );
      $( '#image_attachment_id_' + button_id ).val( attachment.id );
      // Restore the main post ID
      wp.media.model.settings.post.id = wp_media_post_id;
    });
      // Finally, open the modal
      file_frame.open();
  });
  // Restore the main ID when the add media button is pressed
  jQuery( 'a.add_media' ).on( 'click', function() {
    wp.media.model.settings.post.id = wp_media_post_id;
  });
});
