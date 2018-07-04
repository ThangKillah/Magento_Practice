<?php
namespace OpenTechiz\Blog\Model;

class Post  extends \Magento\Framework\Model\AbstractModel
{
    /**#@+
     * Post's Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;


    protected $_eventPrefix = 'blog_post';


    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Post');
    }

    public function checkUrlKey($url_key)
    {
        return $this->_getResource()->checkUrlKey($url_key);
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

}