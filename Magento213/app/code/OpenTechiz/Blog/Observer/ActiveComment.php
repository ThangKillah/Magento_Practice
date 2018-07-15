<?php
namespace OpenTechiz\Blog\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ActiveComment implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        die('test observer');
	}
}