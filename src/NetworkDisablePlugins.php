<?php

namespace PrimeTime\WordPress\PluginControl;

class NetworkDisablePlugins extends ToggleNetworkPlugins
{
    protected $message = 'Force network-disabled';

    public function change_action_links( $actions )
    {
        unset($actions[ 'delete' ]);
        unset($actions[ 'activate' ]);
        unset($actions[ 'enabled' ]);
        $actions[ 'disabled' ] = '<i>' . esc_html($this->message) . '</i>';

        return $actions;
    }

    public function set_activation( $enabled_plugins )
    {
        foreach ( $this->plugins as $plugin )
        {
            if ( isset($enabled_plugins[ $plugin ]) )
            {
                unset($enabled_plugins[ $plugin ]);
            }
        }

        return $enabled_plugins;
    }
}
