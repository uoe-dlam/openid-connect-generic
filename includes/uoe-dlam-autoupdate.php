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
