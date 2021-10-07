<?php

namespace app\components;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\base\Widget;
use yii\helpers\Html;

class Nav extends Widget
{
   public $i; 
   public $url;
   public $label;
   public $linkOptions;
   public $items;
   public $options;


public function run()
   {  
      return $this->renderItems(); 
   }

   public function renderItems()
   {
      $items = [];
        foreach ($this->items as $i => $item) {
            
            $items[] = $this->renderItem($item);
        }

        return Html::tag('ul', implode("\n", $items), $this->options);
    }
    
    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        
        $label = ($item['label']);
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);


        return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
    }

   }




