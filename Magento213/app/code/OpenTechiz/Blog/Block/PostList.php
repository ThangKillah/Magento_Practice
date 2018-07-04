<?php
namespace OpenTechiz\Blog\Block;

use OpenTechiz\Blog\Api\Data\PostInterface;
use OpenTechiz\Blog\Model\ResourceModel\Post\Collection as PostCollection;

class PostList extends \Magento\Framework\View\Element\Template
{
    protected $_postCollecionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OpenTechiz\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionfactory,
        array $data = [])
    {
        parent::__construct($context, $data);
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