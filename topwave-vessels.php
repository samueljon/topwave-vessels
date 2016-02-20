<?php
/*
 * Plugin Name: TopWave Vessels
 * Version: 1.0
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: This is your starter template for your next WordPress plugin.
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: topwave-vessels
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-topwave-vessels.php' );
require_once( 'includes/class-topwave-vessels-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-topwave-vessels-admin-api.php' );
require_once( 'includes/lib/class-topwave-vessels-post-type.php' );
require_once( 'includes/lib/class-topwave-vessels-taxonomy.php' );

/**
 * Returns the main instance of TopWave_Vessels to prevent the need to use globals.
 *
 * @since  1.0.1
 * @return object TopWave_Vessels
 */
function TopWave_Vessels () {
	$instance = TopWave_Vessels::instance( __FILE__, '1.0.1' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = TopWave_Vessels_Settings::instance( $instance );
	}

	return $instance;
}

TopWave_Vessels();


TopWave_Vessels()->register_post_type(
    'vessel',
    __('Vessels', 'topwave-vessels'),
    __('Vessel', 'topwave-vessels')
);

TopWave_Vessels()->register_taxonomy(
    'vessel_type',
    __( 'Vessel Types', 'topwave-vessels' ),
    __( 'Vessel Type', 'topwave-vessels' ),
    'vessel'
);

TopWave_Vessels()->register_taxonomy(
	'vessel_status',
	__( 'Vessel Status', 'topwave-vessels' ),
	__( 'Vessel Status', 'topwave-vessels' ),
	'vessel'
);