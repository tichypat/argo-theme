<?php 

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];
}, 10, 4 );

// Add SVG as one of the enabled mime types
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// Display SVG in Media Library
function display_svg_media_thumbnails( $response, $attachment, $meta ) {
    // Check if the file is an SVG
    if( $response['type'] === 'image' && $response['subtype'] === 'svg+xml' && class_exists('SimpleXMLElement') ) {
        // Get the SVG file content
        $path = get_attached_file( $attachment->ID );
        if ( @file_exists( $path ) ) {
            $svg = simplexml_load_file( $path );
            if ( $svg !== false ) {
                // Set image dimensions (optional, this can be set to a fixed size as needed)
                $response['image']['src'] = $response['url'];
                $response['image']['width'] = (int) $svg['width'];
                $response['image']['height'] = (int) $svg['height'];
            }
        }
    }
    return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'display_svg_media_thumbnails', 10, 3 );

// Fix display SVG in admin
function fix_svg_display_in_admin() {
  echo '<style type="text/css">
            td .media-icon img[src$=".svg"] {
                width: 100% !important;
                height: auto !important;
            }
        </style>';
}
add_action( 'admin_head', 'fix_svg_display_in_admin' );