<?php

namespace PrimeTime\WordPress\PluginControl;

abstract class TogglePlugins
{
    protected $plugins = [];
    protected $message;

    const FILTER_HOOK_ACTIVATION = 'option_active_plugins';

    const FILTER_HOOK_ACTION_LINKS = 'plugin_action_links_';

    /**
     * New plugin toggle control instance
     * @param mixed $plugins string single plugin, or array of plugin files to set activation for
     * @param null  $message (optional) message for plugin action link
     */
    public function __construct( $plugins, $message = null )
    {
        if ( ! is_array($plugins) ) {
            $plugins = [$plugins];
        }

        foreach ( $plugins as $plugin ) {
            $this->add_plugin($plugin);
        }

        if ( !is_null($message) ) {
            $this->message = $message;
        }

        add_filter(static::FILTER_HOOK_ACTIVATION, [$this, 'set_activation']);
    }

    /**
     * Adds a filename to the list of plugins to toggle
     * and sets up a filter callback for each plugin's action links
     *
     * @param $file
     */
    protected function add_plugin( $file )
    {
        $this->plugins[ ] = $file;
        add_filter(static::FILTER_HOOK_ACTION_LINKS . plugin_basename($file), [$this, 'change_action_links']);
    }

    /**
     * Filter callback for plugin action links
     *
     * @param $actions
     *
     * @return mixed
     */
    abstract public function change_action_links( $actions );

    /**
     * Filter callback for activation option
     *
     * @param array $enabled_plugins WP-provided list of plugin filenames
     *
     * @return array The filtered array of plugin filenames
     */
    abstract public function set_activation( $enabled_plugins );
}
