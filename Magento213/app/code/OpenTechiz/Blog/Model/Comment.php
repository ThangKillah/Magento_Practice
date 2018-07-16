<?php
namespace OpenTechiz\Blog\Model;

use OpenTechiz\Blog\Api\Data\CommentInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Comment extends \Magento\Framework\Model\AbstractModel
    implements CommentInterface,IdentityInterface
{
    const STATUS_PENDING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DENY = 2;

    const CACHE_TAG='opentechiz_blog_comment';
    const CACHE_COMMENT_POST_TAG = "opentechiz_blog_comment_post";


    protected $_eventPrefix = 'blog_comment';


    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Comment');
    }
    
    public function getAvailableStatuses()
    {
        return [self::STATUS_PENDING => __('Pending'), self::STATUS_ACTIVE => __('Active'), self::STATUS_DENY => __('Deny')];
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getID()];
    }
    
}