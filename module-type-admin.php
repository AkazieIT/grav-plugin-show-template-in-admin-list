<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class ModuleTypeAdminPlugin extends Plugin
{
    /**
     * Subscribe to Grav lifecycle events
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized'      => ['onPluginsInitialized', 0],
            'onAdminTwigTemplatePaths'  => ['onAdminTwigTemplatePaths', 0],
        ];
    }

    /**
     * Initialize plugin - only run in admin to avoid overhead on the frontend
     */
    public function onPluginsInitialized()
    {
        // Only proceed if we are in the Admin plugin
        if (!$this->isAdmin()) {
            return;
        }

        // Any additional Admin-only setup goes here
    }

    /**
     * Add our templates folder to the Admin's Twig paths
     */
    public function onAdminTwigTemplatePaths($event)
    {
        // Merge our plugin's templates folder into Admin's Twig lookup paths
        $event['paths'] = array_merge(
            $event['paths'],
            [__DIR__ . '/templates']
        );
    }
}
