<?php
/**
 * AvailabilityPlus Controller
 *
 * PHP version 7
 *
 * @category VuFind
 * @package  Controller
 * @author   Kristof Kessler <mail@kristofkessler.com>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org Main Site
 */
namespace SearchTools\Controller;

/**
 * AvailabilityPlus Class
 *
 * Controls AvailabilityPlus Routes
 *
 * @category VuFind
 * @package  Controller
 * @author   Kristof Keßler <mail@kristofkessler.com>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org/wiki/development Wiki
 */
class AvailabilityPlusController extends \VuFind\Controller\AbstractBase
{
    /**
     * Display Feedback home form.
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function homeAction()
    {
        $this->layout()->setTemplate('availabilityplus/testcases');
        return $this->createViewModel();
    }

}
