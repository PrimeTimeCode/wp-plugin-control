<?php

namespace PrimeTime\WordPress\PluginControl;

class DisablePlugins extends TogglePlugins
{
    protected $message = 'Disabled in this environment';

    public function change_action_links( $actions )
    {
        unset($actions[ 'activate' ]);
        unset($actions[ 'delete' ]);
        unset($actions[ 'enabled' ]);
        $actions[ 'disabled' ] = '<i>' . esc_html($this->message) . '</i>';

        return $actions;
    }

    public function set_activation( $enabled_plugins )
    {
        foreach ( $this->plugins as $plugin )
        {
            $key = array_search($plugin, $enabled_plugins);

            if ( false !== $key ) {
                unset($enabled_plugins[ $key ]);
            }
        }

        return $enabled_plugins;
    }
}
