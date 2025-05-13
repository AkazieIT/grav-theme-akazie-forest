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
      ];
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