<?php
/**
 * Automatic updates configuration for a the UoE Dlam OpenID fork via GitHub Releases.
 * This uses https://github.com/YahnisElsts/plugin-update-checker plugin,
 * which is installed with the composer.
 */

defined( 'ABSPATH' ) || exit;

use YahnisElsts\PluginUpdateChecker\v6\PucFactory;

$fork_slug = 'daggerhart-openid-connect-generic';
$main_plugin_file = dirname( __DIR__ ) . '/openid-connect-generic.php';

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/uoe-dlam/openid-connect-generic',
	$main_plugin_file,
	$fork_slug
);

$myUpdateChecker->getVcsApi()->enableReleaseAssets();

if ( defined( 'UOE_DLAM_BLOGS_PAT' ) && is_string( UOE_DLAM_BLOGS_PAT ) && '' !== UOE_DLAM_BLOGS_PAT ) {
	$myUpdateChecker->setAuthentication( UOE_DLAM_BLOGS_PAT );
}


add_action( 'admin_notices', function () {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    $updates = get_site_transient( 'update_plugins' );
    foreach ( ( $updates->response ?? [] ) as $file => $data ) {
        if ( str_contains( $file, 'dd-plugin-name' ) ) {
            echo '<div class="notice notice-warning"><pre>';
            echo 'Plugin file: ' . esc_html( $file ) . "\n";
            echo 'Slug: ' . esc_html( $data->slug ?? 'brak' ) . "\n";
            echo 'New version: ' . esc_html( $data->new_version ?? 'brak' ) . "\n";
            echo 'Package URL: ' . esc_html( $data->package ?? 'brak' ) . "\n";
            echo '</pre></div>';
        }
    }
} );
