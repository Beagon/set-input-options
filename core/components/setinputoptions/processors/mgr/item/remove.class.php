<?php
/**
 * Remove an Item.
 * 
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsItemRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'SetInputOptionsItem';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.item';
}
return 'SetInputOptionsItemRemoveProcessor';