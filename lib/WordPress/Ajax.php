<?php
if ( ! class_exists( 'Zara4_WordPress_Ajax' ) ) {


  /**
   * Class Zara4_WordPress_Ajax
   */
  class Zara4_WordPress_Ajax {


    /*
     *    _____
     *   / ____|
     *  | |      ___   _ __ ___   _ __   _ __  ___  ___  ___
     *  | |     / _ \ | '_ ` _ \ | '_ \ | '__|/ _ \/ __|/ __|
     *  | |____| (_) || | | | | || |_) || |  |  __/\__ \\__ \
     *   \_____|\___/ |_| |_| |_|| .__/ |_|   \___||___/|___/
     *                           | |
     *                           |_|
     */


    /**
     * AJAX call to compress an image using.
     */
    public static function compress() {
      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];

      $attachment = new Zara4_WordPress_Attachment_Attachment( $id );
      $response = $attachment->compress( new Zara4_WordPress_Settings() );

      die( json_encode( $response ) );
    }


    /**
     * AJAX call to compress the given sizes of the given attachment id.
     */
    public static function compress_sizes() {
      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];
      $sizes = (array) $_REQUEST['sizes'];

      $attachment = new Zara4_WordPress_Attachment_Attachment( $id );
      $response = $attachment->compress_sizes( $sizes, new Zara4_WordPress_Settings() );

      die( json_encode( $response ) );
    }


    // --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- ---


    /*
     *   _____             _                        ____                _
     *  |  __ \           | |                      |  _ \              | |
     *  | |__) | ___  ___ | |_  ___   _ __  ___    | |_) |  __ _   ___ | | __ _   _  _ __
     *  |  _  / / _ \/ __|| __|/ _ \ | '__|/ _ \   |  _ <  / _` | / __|| |/ /| | | || '_ \
     *  | | \ \|  __/\__ \| |_| (_) || |  |  __/   | |_) || (_| || (__ |   < | |_| || |_) |
     *  |_|  \_\\___||___/ \__|\___/ |_|   \___|   |____/  \__,_| \___||_|\_\ \__,_|| .__/
     *                                                                              | |
     *                                                                              |_|
     */

    /**
     * AJAX call to restore an image back to it's original (Processes a single image ID).
     *
     * Removes Zara 4 images and restores originals.
     */
    public static function restore_backup() {
      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];


      try {

        $attachment = new Zara4_WordPress_Attachment_Attachment( $id );
        $attachment->restore_backup();

        //$this->restore_original_image_from_id( $id );
      } catch( \Exception $e ) {
        die( json_encode( array(
          'status'	=> 'error',
          'message' => $e->getMessage(),
        ) ) );
      }

      die( json_encode( array(
        'status' => 'success',
      ) ) );
    }


    /**
     *
     */
    public static function restore_backup_for_sizes() {
      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];
      $sizes = (array) $_REQUEST['sizes'];

      $image = new Zara4_WordPress_Attachment_Attachment( $id );
      $response = $image->restore_backup_for_sizes( $sizes );

      die( json_encode( $response ) );
    }


    // --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- ---


    /*
     *   _____         _        _            ____                _
     *  |  __ \       | |      | |          |  _ \              | |
     *  | |  | |  ___ | |  ___ | |_  ___    | |_) |  __ _   ___ | | __ _   _  _ __
     *  | |  | | / _ \| | / _ \| __|/ _ \   |  _ <  / _` | / __|| |/ /| | | || '_ \
     *  | |__| ||  __/| ||  __/| |_|  __/   | |_) || (_| || (__ |   < | |_| || |_) |
     *  |_____/  \___||_| \___| \__|\___|   |____/  \__,_| \___||_|\_\ \__,_|| .__/
     *                                                                       | |
     *                                                                       |_|
     */

    /**
     * AJAX call to restore an image back to it's original (Processes a single image ID).
     *
     * Removes Zara 4 images and restores originals.
     */
    public static function delete_backup() {
      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];

      try {

        $attachment = new Zara4_WordPress_Attachment_Attachment( $id );
        $attachment->delete_backup();

        //$this->delete_original_image_from_id( $id );
      } catch( \Exception $e ) {
        die( json_encode( array(
          'status'	=> 'error',
          'message' => $e->getMessage(),
        ) ) );
      }

      die( json_encode( array(
        'status' => 'success',
      ) ) );
    }


    /**
     *
     */
    public static function delete_backup_for_sizes() {
      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];
      $sizes = (array) $_REQUEST['sizes'];

      $image = new Zara4_WordPress_Attachment_Attachment( $id );
      $response = $image->delete_backup_for_sizes( $sizes );

      die( json_encode( $response ) );
    }


    // --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- ---


    /*
     *   ____          _  _
     *  |  _ \        | || |
     *  | |_) | _   _ | || | __
     *  |  _ < | | | || || |/ /
     *  | |_) || |_| || ||   <
     *  |____/  \__,_||_||_|\_\
     *
     */

    /**
     *
     */
    public static function exclude_from_bulk_compression() {

      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];

      $image = new Zara4_WordPress_Attachment_Attachment( $id );
      $image->exclude_from_bulk_compression();

      die( json_encode( array() ) );

    }


    /**
     *
     */
    public static function include_in_bulk_compression() {

      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];

      $image = new Zara4_WordPress_Attachment_Attachment( $id );
      $image->include_in_bulk_compression();

      die( json_encode( array() ) );

    }


    // --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- ---


    /*
     *   _____          __                                _    _
     *  |_   _|        / _|                              | |  (_)
     *    | |   _ __  | |_  ___   _ __  _ __ ___    __ _ | |_  _   ___   _ __
     *    | |  | '_ \ |  _|/ _ \ | '__|| '_ ` _ \  / _` || __|| | / _ \ | '_ \
     *   _| |_ | | | || | | (_) || |   | | | | | || (_| || |_ | || (_) || | | |
     *  |_____||_| |_||_|  \___/ |_|   |_| |_| |_| \__,_| \__||_| \___/ |_| |_|
     *
     */


    /**
     *
     */
    public static function uncompressed_images() {

      $all_ids = Zara4_WordPress_Attachment_Attachment::all_ids();
      $uncompressed_attachment_ids = array();

      foreach ( $all_ids as $id ) {
        $attachment = new Zara4_WordPress_Attachment_Attachment( $id );

        if ( ! $attachment->is_compressed() && ! $attachment->should_be_excluded_from_bulk_compression() ) {
          $uncompressed_attachment_ids[] = $id;
        }
      }

      die( json_encode( $uncompressed_attachment_ids ) );
    }


    /**
     *
     */
    public static function compression_info() {

      @error_reporting( 0 );

      header( 'Content-type: application/json' );
      $id = (int) $_REQUEST['id'];

      $wordpress_image = new Zara4_WordPress_Attachment_Attachment( $id );
      $image_files = $wordpress_image->all_image_files();


      $records = array();
      foreach ( $image_files as $size => $image_file ) {
        $metadata = $image_file->meta_data();
        $compressed = $metadata ? $metadata->get_is_compressed() : false;
        $original_file_size = $image_file->original_file_size();
        $compressed_file_size = $metadata ? $metadata->get_compressed_file_size() : null;
        $percentage_saving = $metadata ? $metadata->get_percentage_saving() : null;
        $records[$size] = array(
          'compressed' => $compressed,
          'has-backup' => $image_file->has_backup(),
          'original-file-size' => $original_file_size,
          'compressed-file-size' => $compressed_file_size,
          'percentage-saving' => $percentage_saving,
        );
        //$records[$size] = $image_file->generate_response();
      }

      die( json_encode( array(
        'status'              => 'success',
        'images'              => $records,
        'image'	              => $wordpress_image->generate_response(),
        'excluded-from-bulk'  => $wordpress_image->should_be_excluded_from_bulk_compression(),
      ) ) );
    }


    // --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- --- ---


    /*
     *   ____                _
     *  |  _ \              | |
     *  | |_) |  __ _   ___ | | __ _   _  _ __
     *  |  _ <  / _` | / __|| |/ /| | | || '_ \
     *  | |_) || (_| || (__ |   < | |_| || |_) |
     *  |____/  \__,_| \___||_|\_\ \__,_|| .__/
     *                                   | |
     *                                   |_|
     */

    /**
     *
     */
    function images_with_backup() {

      $all_image_ids = Zara4_WordPress_Attachment_Attachment::all_image_ids();

      $image_ids = array();
      foreach ( $all_image_ids as $image_id ) {
        $image = new Zara4_WordPress_Attachment_Attachment( $image_id );
        if ( $image->has_backup() ) {
          $image_ids[] = $image_id;
        }
      }

      die( json_encode( $image_ids ) );
    }


    /**
     *
     */
    function delete_all_backups() {

      $all_image_ids = Zara4_WordPress_Attachment_Attachment::all_image_ids();

      foreach ( $all_image_ids as $image_id ) {
        $image = new Zara4_WordPress_Attachment_Attachment( $image_id );
        if ( $image->has_backup() ) {
          $image->delete_backup();
        }
      }

      die;
    }


  }

}