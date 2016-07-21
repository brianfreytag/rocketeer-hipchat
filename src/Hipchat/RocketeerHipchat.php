<?php
namespace Rocketeer\Plugins\Hipchat;

use Rocketeer\Plugins\AbstractNotifier;
use Hipchat\Notifier as Hipchat;

class RocketeerHipchat extends AbstractNotifier
{
    /**
     * @var string
     */
    protected $name = 'rocketeer-hipchat';

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->container->share('hipcat', Hipchat::class);
    }

    /**
	 * Send a given message
	 *
	 * @param string $message
	 *
	 * @return void
	 */
	public function send($message)
	{
	    $room = $this->getPluginOption('room');
        $color = $this->getPluginOption('color');

        /** @var Hipchat $hipchat */
        $hipchat = $this->container->get('hipchat');
        $hipchat->notifyIn($room, $message, $color);
	}
}
