<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\CurrentLocalTime\Widgets;

use Piwik\Common;
use Piwik\Date;
use Piwik\Site;
use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;

class GetCurrentLocalTimeWidget extends Widget
{
    public static function configure(WidgetConfig $config)
    {
        $config->setCategoryId('Dashboard_Dashboard');
        $config->setName('CurrentLocalTime_CurrentLocalTimeWidget');
        $config->setOrder(99);
    }

    public function render()
    {
        $idSite = Common::getRequestVar('idSite');
        $timezone = Site::getTimezoneFor($idSite);
        $siteTzUtcOffset = (-ceil(Date::getUtcOffset($timezone) / 60));

        return $this->renderTemplate('getCurrentLocalTime', array('timezone' => $siteTzUtcOffset));
    }

}