<?php
namespace Grav\Theme;

use Grav\Common\Data\Blueprints;
use Grav\Common\Theme;
use Grav\Common\Utils;
use RocketTheme\Toolbox\Event\Event;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AkazieForest extends Theme
{
    public static function getSubscribedEvents()
    {
      return [
        'onBlueprintCreated' => ['onBlueprintCreated', 0],
        'onTwigExtensions' => ['onTwigExtensions', 0],
        'onAdminAfterAddMedia' => ['onAdminAfterMediaChange', 0],
        'onAdminAfterDelMedia' => ['onAdminAfterMediaChange', 0],
      ];
    }

    /**
     * Grav 2 workaround: Admin 2.0 applies page-media uploads/deletes
     * immediately without a page save, but the rendered module content stays
     * cached under a key derived from the .md modification time, so the
     * frontend keeps serving the old image list. Touching the page file
     * invalidates exactly that page's content cache, like a save would.
     * In Grav 1 the site theme is not loaded in the admin, so this never runs
     * there and existing installations keep their current behavior.
     */
    public function onAdminAfterMediaChange(Event $event)
    {
        $page = $event['page'] ?? $event['object'] ?? null;
        if (!$page || !method_exists($page, 'filePath')) {
            return;
        }
        $file = $page->filePath();
        if ($file && is_file($file)) {
            @touch($file);
        }
    }
    
    public function onTwigExtensions()
    {
        $this->grav['twig']->twig->addExtension(new StripTagsExtension());
    }

    public function onBlueprintCreated(Event $event)
    {
        // Apply SEO blueprint to non-modular page types only
        $newtype = $event['type'];
        
        // Skip modular pages - only apply SEO to container pages
        if (0 !== strpos($newtype, 'modular/')) {
            $blueprint = $event['blueprint'];
            if ($blueprint->get('form/fields/tabs', null, '/')) {
                $blueprints = new Blueprints(__DIR__ . '/blueprints/extended/');
                $extends = $blueprints->get('seo');
                $blueprint->extend($extends, true);
            }
        }
    }    
    
}
class StripTagsExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('strip_tags_truncate', [$this, 'stripTagsTruncate'])
        ];
    }

    public function stripTagsTruncate($html, $limit, $preserve = false, $separator = '...')
    {
        // Strip HTML tags and then truncate
        $text = strip_tags($html);
        return mb_strimwidth($text, 0, $limit, $separator);
    }
}