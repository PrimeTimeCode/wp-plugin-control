<?php

namespace PrimeTime\WordPress\PluginControl;

class NetworkEnablePlugins extends ToggleNetworkPlugins
{
    protected $message = 'Force network-enabled';

    public function change_action_links( $actions )
    {
        unset($actions[ 'deactivate' ]);
        unset($actions[ 'disabled' ]);
        $actions[ 'enabled' ] = '<i>' . esc_html($this->message) . '</i>';

        return $actions;
    }

    public function set_activation( $enabled_plugins )
    {
        foreach ( $this->plugins as $plugin )
        {
            if ( empty($enabled_plugins[ $plugin ]) )
            {
                $enabled_plugins[ $plugin ] = time();
            }
        }

        return $enabled_plugins;
    }
}