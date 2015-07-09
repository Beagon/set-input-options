<?php

class SetInputOptionsInputOptionExportProcessor extends modProcessor
{
    public $classKey = 'SetInputOptionsInputOption';
    public $languageTopics = array('setinputoptions:default');
    public $objectType = 'setinputoptions.inputoption';

    /**
     * Generates a CSV text based on the the received collection
     * @param  array $collection array with xpdo results
     * @return string
     */
    public function generateCSV(array $collection = array())
    {
        $csvLines = "";

        foreach ($collection as $object) {
            $array = $object->toArray();
            $csvLines .= $array['name'] . ";" . $array['alias'] . ";" . $array['position'] . "\n";
        }

        return $csvLines;
    }

    /**
     * Runs the processor
     */
    public function process()
    {
        $name = "SetInputOptions-Export-" . time() . ".csv";

        //We could sanitize this but since you need to be authenticated with the backend I don't see the point.
        $id = $_GET['id'];

        $c = $this->modx->newQuery($this->classKey);
        $c->where(array(
            'group' => $id,
            'softDelete' => false,
            ));
        $c->sortby('position', 'ASC');

        $collection = $this->modx->getCollection($this->classKey, $c);

        $csv = $this->generateCSV($collection);

        //Set headers to download the csv
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="'.$name.'"');
        return $csv;
    }
}

return 'SetInputOptionsInputOptionExportProcessor';
