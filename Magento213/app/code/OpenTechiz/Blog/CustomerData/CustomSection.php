<?php
namespace OpenTechiz\Blog\CustomerData;
use Magento\Customer\CustomerData\SectionSourceInterface;
 
class CustomSection implements SectionSourceInterface
{
    protected $_notiFactory;
    protected $_notiCollectionFactory;
    protected $_customerSession;

    public function __construct(
        \OpenTechiz\Blog\Model\ResourceModel\Notification\CollectionFactory $notiCollectionFactory,
        \OpenTechiz\Blog\Model\NotificationFactory $notiFactory,
        \Magento\Customer\Model\Session $customerSession
    )
    {
        $this->_notiCollectionFactory = $notiCollectionFactory;
        $this->_notiFactory = $notiFactory;
        $this->_customerSession = $customerSession;
    }

    public function getSectionData()
    {
    	 $customer = $this->_customerSession->getCustomer();
         $user_id = $customer->getId();

          $notiCheck = $this->_notiCollectionFactory->create()
                ->addFieldToFilter('user_id', $user_id);

        return [
            'msg' => count($notiCheck)
        ];
    }
}