<?php
/**
 * Update an Item
 * 
 * @package setinputoptions
 * @subpackage processors
 */

class SetInputOptionsInputOptionsUpdateProcessor extends modObjectUpdateProcessor
{
    public $classKey = 'SetInputOptionsInputOption';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.item';

    public function beforeSet()
    {
        return parent::beforeSet();
    }
}
return 'SetInputOptionsInputOptionsUpdateProcessor';
