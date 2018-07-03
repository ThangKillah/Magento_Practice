<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 02/07/2018
 * Time: 14:23
 */
namespace TestObserver\Discount\Observer;

use Magento\Framework\Event\ObserverInterface;

class DiscountAfterLogin implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
    	 
        // echo "Customer LoggedIn";
        // $customer = $observer->getEvent()->getCustomer();
        //   echo '<pre>';
        //   print_r($customer->getData());
        // echo $customer->getName(); //Get customer name
        // exit;


        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$cart = $objectManager->get('\Magento\Checkout\Model\Cart');


		// get quote items array
		$items = $cart->getQuote()->getAllVisibleItems();

		foreach($items as $item) {
			$item = ($item->getParentItem() ? $item->getParentItem() : $item);
	        $price = $item->getProduct()->getPriceInfo()->getPrice('final_price')->getValue();
	        $new_price = $price - ($price * 50 / 100); //discount the price of the product to 50%
	        $item->setCustomPrice($new_price);
	        $item->setOriginalCustomPrice($new_price);
	        $item->getProduct()->setIsSuperMode(true);
		}
	}
}