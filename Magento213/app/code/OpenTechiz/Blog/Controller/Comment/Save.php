<?php

namespace OpenTechiz\Blog\Controller\Comment;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;


class Save extends \Magento\Framework\App\Action\Action
{
    protected $_resultFactory;

    public function __construct(Context $context
    )
    {
        $this->_resultFactory = $context->getResultFactory();
        parent::__construct($context);
    }

    public function execute()
    {
        $postData = (array) $this->getRequest()->getPost();



        $resultRedirect = $this->_resultFactory->create(ResultFactory::TYPE_REDIRECT);

        $postData = (array) $this->getRequest()->getPost();
        if (!empty($postData)) {
            // Retrieve your form data
            $author   = $postData['user_id'];
            $content    = $postData['content'];
            $post_id = $postData['post_id'];


            $comment = $this->_objectManager->create('OpenTechiz\Blog\Model\Comment');
            $comment->setUserId($author);
            $comment->setContent($content);
            $comment->setPostId($post_id);
            $comment->save();

        }

        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }

}