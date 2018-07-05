<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 05/07/2018
 * Time: 15:01
 */

namespace OpenTechiz\Blog\Model\ResourceModel;


class Comment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('opentechiz_blog_comment', 'comment_id');
    }
}