<?php

namespace PrimeTime\WordPress\PluginControl;

class EnablePlugins extends TogglePlugins
{
    protected $message = 'Force-enabled';

    public function change_action_links( $actions )
    {
        unset($actions[ 'deactivate' ]);
        unset($actions[ 'delete' ]);
        unset($actions[ 'disabled' ]);
        $actions[ 'enabled' ] = '<i>' . esc_html($this->message) . '</i>';

        return $actions;
    }

    public function set_activation( $enabled_plugins )
    {
        foreach ( $this->plugins as $plugin )
        {
            if ( ! in_array($plugin, $enabled_plugins) ) {
                $enabled_plugins[ ] = $plugin;
            }
        }

        return $enabled_plugins;
    }
}