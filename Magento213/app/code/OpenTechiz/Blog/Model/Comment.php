<?php
namespace OpenTechiz\Blog\Model;


class Comment extends \Magento\Framework\Model\AbstractModel
    implements \OpenTechiz\Blog\Api\Data\CommentInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    protected $_eventPrefix = 'blog_comment';


    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Comment');
    }
    
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
    
}