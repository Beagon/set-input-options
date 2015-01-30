<?php
/**
 * Loads the home page.
 *
 * @package setinputoptions
 * @subpackage controllers
 */
class SetInputOptionsHomeManagerController extends SetInputOptionsBaseManagerController
{

    public function process(array $scriptProperties = array())
    {

    }

    public function getPageTitle()
    {
        return $this->modx->lexicon('setinputoptions');
    }
    
    public function loadCustomCssJs()
    {
        if ($_GET["id"] == null) {
            $this->addJavascript($this->setinputoptions->getOption('jsUrl').'mgr/extras/griddraganddrop.js');
            $this->addJavascript($this->setinputoptions->getOption('jsUrl').'mgr/widgets/groups.grid.js');
            $this->addJavascript($this->setinputoptions->getOption('jsUrl').'mgr/panels/groups.panel.js');
            $this->addLastJavascript($this->setinputoptions->getOption('jsUrl').'mgr/sections/groups.js');
        } else {
            $this->addJavascript($this->setinputoptions->getOption('jsUrl').'mgr/extras/griddraganddrop.js');
            $this->addJavascript($this->setinputoptions->getOption('jsUrl').'mgr/widgets/inputoptions.grid.js');
            $this->addJavascript($this->setinputoptions->getOption('jsUrl').'mgr/panels/inputoptions.panel.js');
            $this->addLastJavascript($this->setinputoptions->getOption('jsUrl').'mgr/sections/inputoptions.js');
            $group = $this->modx->getObject('SetInputOptionsInputOption', $_GET['id']);

            //Check if not removed
            if (!$group) {
                $groupName = json_encode("Not Found");
            } else {
                $groupName = json_encode($group->get('name'));
            }

            $this->addHtml('
                <script type="text/javascript">
                        addGroupId = '. $_GET['id'] .';
                        pageTitle = ' . $groupName . ';
                </script>
            ');
        }
    }

    public function getTemplateFile()
    {
        if ($_GET["id"] == null) {
            return $this->setinputoptions->getOption('templatesPath').'groups.tpl';
        } else {
            return $this->setinputoptions->getOption('templatesPath').'inputoptions.tpl';
        }
    }
}
