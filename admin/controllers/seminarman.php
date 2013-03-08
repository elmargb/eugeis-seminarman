<?php
/**
* @Copyright Copyright (C) 2010 www.profinvent.com. All rights reserved.
* Copyright (C) 2011 Open Source Group GmbH www.osg-gmbh.de
* @website http://www.profinvent.com
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/

defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

class seminarmanControllerSeminarman extends seminarmanController
{

    function __construct($config = array())
    {
        parent::__construct($config);

        $this->registerTask('add', 'display');
        $this->registerTask('edit', 'display');
    }

    function display()
    {
        switch ($this->getTask())
        {
            case 'add':
                {
                    JRequest::setVar('hidemainmenu', 1);
                    JRequest::setVar('layout', 'form');
                    JRequest::setVar('view', $this->childviewname);
                    JRequest::setVar('edit', false);

                    $model = $this->getModel($this->childviewname);
                    $model->checkout();
                }

                break;
            case 'edit':
                {
                    JRequest::setVar('hidemainmenu', 1);
                    JRequest::setVar('layout', 'form');
                    JRequest::setVar('view', $this->childviewname);
                    JRequest::setVar('edit', true);

                    $model = $this->getModel($this->childviewname);
                    $model->checkout();
                }

                break;
        }

        parent::display();
    }


    function settings()
    {

        JRequest::checkToken() or jexit('Invalid Token');

        $this->setRedirect('index.php?option=com_seminarman&view=settings');
    }

}

?>