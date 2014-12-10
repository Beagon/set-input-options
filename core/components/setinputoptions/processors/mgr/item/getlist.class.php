<?php
/**
 * Get list Items
 *
 * @package setinputoptions
 * @subpackage processors
 */
class SetInputOptionsItemGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'SetInputOptionsItem';
    public $languageTopics = array('setinputoptions:default');
    public $defaultSortField = 'position';
    public $defaultSortDirection = 'ASC';
    public $objectType = 'setinputoptions.item';

    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                    'name:LIKE' => '%'.$query.'%',
                    'OR:description:LIKE' => '%'.$query.'%',
                ));
        }
        return $c;
    }
}
return 'SetInputOptionsItemGetListProcessor';