<?php
/**
 * Update an Item
 * 
 * @package setinputoptions
 * @subpackage processors
 */

class SetInputOptionsItemUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'SetInputOptionsItem';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.item';

    public function beforeSet() {

        return parent::beforeSet();
    }

}
return 'SetInputOptionsItemUpdateProcessor';