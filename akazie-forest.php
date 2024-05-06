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
    /*
    public function getThemeConfigKey($key = null) {
        $pluginKey = 'themes.' . $this->name;
        return ($key !== null) ? $pluginKey . '.' . $key : $pluginKey;
    }

    public function getThemeConfigValue($key = null, $default = null) {
        return $this->config->get($this->getThemeConfigKey($key), $default);
    }

    public function getConfigValue($key, $default = null) {
        return $this->config->get($key, $default);
    }
    */

    public static function getSubscribedEvents()
    {
      return [
     
    //    'onBlueprintCreated' => ['onBlueprintCreated', 0],
            'onTwigExtensions' => ['onTwigExtensions', 0],
      ];
    }
    public function onTwigExtensions()
    {

        $this->grav['twig']->twig->addExtension(new StripTagsExtension());
    }
/*
    public function onBlueprintCreated(Event $event)
    {
        $newtype = $event['type'];
    
        if (0 === strpos($newtype, 'modular/') || 0 === strpos($newtype, 'blog') || 0 === strpos($newtype, 'portfolio') || 0 === strpos($newtype, 'item') || 0 === strpos($newtype, 'portfolio-item')){
        } else {
            $blueprint = $event['blueprint'];
            if ($blueprint->get('form/fields/tabs', null, '/')) {
    
            $blueprints = new Blueprints(__DIR__ . '/blueprints/extended/');
            $extends = $blueprints->get('options');
            $blueprint->extend($extends, true);
    
            }
        }

        if (0 === strpos($newtype, 'blog') || 0 === strpos($newtype, 'portfolio') || 0 === strpos($newtype, 'item') || 0 === strpos($newtype, 'portfolio-item')) {
        } else {  
            $blueprint = $event['blueprint'];
            if ($blueprint->get('form/fields/tabs', null, '/')) {
        
                $blueprints = new Blueprints(__DIR__ . '/blueprints/extended/');
                $extends = $blueprints->get('advanced');
                $blueprint->extend($extends, true);
        
            }
        }
    }    
*/
    
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