<?php

namespace PrimeTime\WordPress\PluginControl;

abstract class ToggleNetworkPlugins extends TogglePlugins
{

    const FILTER_HOOK_ACTIVATION = 'site_option_active_sitewide_plugins';

    const FILTER_HOOK_ACTION_LINKS = 'network_admin_plugin_action_links_';
}
