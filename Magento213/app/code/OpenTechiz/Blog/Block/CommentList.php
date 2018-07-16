<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 05/07/2018
 * Time: 15:10
 */

namespace OpenTechiz\Blog\Block;


class CommentList extends \Magento\Framework\View\Element\Template

{
    protected $_commentCollecionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory $commentCollectionfactory,
        \OpenTechiz\Blog\Model\NotificationFactory $notiFactory,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->_commentCollecionFactory = $commentCollectionfactory;
    }

    public function getComments()
    {
        if(!$this->hasData('comments'))
        {
            $post_id = $this->getRequest()->getParam('post_id');
            $comments = $this->_commentCollecionFactory->create()
                ->addFilter('status', 1)
                ->addFilter('post_id', $post_id);
            $this->setData('comments', $comments);
        }

        return $this->getData('comments');
    }

    public function getPostID()
    {
        return $this->_request->getParam('post_id', false);
    }


    public function getIdentities()
    {
        $identities = [];
        foreach ($this->getComments() as $comment) {
            $identities = array_merge($identities, $comment->getIdentities());
        }
        $identities[] = \OpenTechiz\Blog\Model\Comment::CACHE_COMMENT_POST_TAG.'_'.$this->getPostID();
        return $identities;
    }
    
}