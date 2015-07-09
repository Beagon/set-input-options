<?php
/**
 * This snippet can be used to list the input option values in your chunks and templates.
 *
 * Example usage: [[getInputOptions? &tvOutput=`[[*your_template_variable]]`]]
 *
 * @package SetInputOptions
 */

// Include SetInputOptions class
require_once $modx->getOption('setinputoptions.core_path', null, $modx->getOption('core_path').'components/setinputoptions/').'model/setinputoptions/setinputoptions.class.php';

$setinputoptions = $modx->getService('setinputoptions', 'setinputoptions', $modx->getOption('setinputoptions.core_path', null, $modx->getOption('core_path').'components/setinputoptions/').'model/setinputoptions/', $scriptProperties);

if (!($setinputoptions instanceof setinputoptions)) {
    return '';
}

$tpl = $modx->getOption('tpl', $scriptProperties, "inputOptionsRow");
$delimiter = $modx->getOption('delimiter', $scriptProperties, ",");
$templateVariable = (!is_null($modx->getOption('tv', $scriptProperties)) ? $modx->getOption('tv', $scriptProperties) : $modx->getOption('tvOutput', $scriptProperties));
$outputDelimiter = $modx->getOption('outputDelimiter', $scriptProperties, "\n");

if (is_null($templateVariable)) {
    return 'You forgot the tvOutput parameter.';
}

$query = $modx->newQuery('SetInputOptionsInputOption');
$query->where(array('id:IN' => explode($delimiter, $templateVariable)));
$query->sortBy("position");
$inputOptions = $modx->getCollection('SetInputOptionsInputOption', $query);

$list = array();
foreach ($inputOptions as $value) {
    $list[] = $modx->getChunk($tpl, $value->toArray());
}

/* output */

$output = implode($outputDelimiter, $list);

/* by default just return output */
return $output;