<?php
namespace OpenTechiz\Blog\Block\Account;

use OpenTechiz\Blog\Api\Data\PostInterface;
use OpenTechiz\Blog\Model\ResourceModel\Post\Collection as PostCollection;

class Customer extends \Magento\Framework\View\Element\Template
{
    protected $_postCollecionFactory;
    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OpenTechiz\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionfactory,
         \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig ,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->_scopeConfig = $scopeConfig;
        $this->_postCollecionFactory = $postCollectionfactory;
    }

    public function getPost()
    {
        if(!$this->hasData('posts'))
        {
            $posts = $this->_postCollecionFactory->create()
                ->addFilter('status', 1)
                ->addOrder(
                    PostInterface::CREATION_TIME,
                    PostCollection::SORT_ORDER_DESC
                );
            $this->setData('posts', $posts);
        }

        return $this->getData('posts');
    }

}