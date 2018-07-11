<?php
namespace OpenTechiz\Blog\Model;


class Comment extends \Magento\Framework\Model\AbstractModel
    implements \OpenTechiz\Blog\Api\Data\CommentInterface
{
    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DENY = 2;


    protected $_eventPrefix = 'blog_comment';


    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Comment');
    }
    
    public function getAvailableStatuses()
    {
        return [self::STATUS_PENDING => __('Pending'), self::STATUS_ACTIVE => __('Active'), self::STATUS_DENY => __('Deny')];
    }
    
}