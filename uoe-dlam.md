This repository is a fork of [openid-connect-generic](https://github.com/oidc-wp/openid-connect-generic) WordPress plug-in.

It contains some changes to support its use in the University of Edinburgh Blogging platform.

**Please update the repository Wiki pages when making changes to this file.**

# Changes

Here is a list of changes made to the original plug-in ([details in PR #1](https://github.com/uoe-dlam/openid-connect-generic/pull/1)):

-   Use of `get_site_transient` instead of `get_transient`
-   Some options were moved to config (wp-config.php):
    -   'login_button_text' => 'OIDC_LOGIN_BUTTON_TEXT',
    -   'email_format' => 'OIDC_ENDPOINT_EMAIL_FORMAT',
    -   'alternate_redirect_uri' => 'OIDC_ALTERNATE_REDIRECT_URI',
    -   'identity_key' => 'OIDC_IDENTITY_KEY',
    -   'identify_with_username' => 'OIDC_IDENTIFY_WITH_USERNAME',
-   Client secret has been removed from being displayed on the plug-in page,
-   Client secret is stored in an external file (a change requires raising a Unidesk call),
-   The redirect uri has been set to the main blog (site): `$redirect_uri = get_admin_url( get_main_site_id() ) . 'admin-ajax.php?action=openid-connect-authorize';`,
-   The discovery form (Quick Setup: Import from Discovery Document) has been removed,
-   The plug-in setup form is only available in the main blog site dashboard.

# Build plugin

To get plug-in build for the WordPress please run:

-   `npm run grunt build-dist`

This will then update the content of the `dist` directory with the latest changes.

Please zip the content of this directory as `daggerhart-openid-connect-generic.zip` and upload to the Blogs platform with standard WordPress upload plug-in form.

## Important

The decompressed folder name should be **`daggerhart-openid-connect-generic`**.

Please make sure you do not include any `git` related folders and files.
