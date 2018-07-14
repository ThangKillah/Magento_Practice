<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 05/07/2018
 * Time: 19:26
 */

namespace OpenTechiz\Blog\Block;


class CommentForm extends \Magento\Framework\View\Element\Template
{
    protected $customerSession;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        array $data = [])
    {
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function getAjaxUrl()
    {
        return '/Magento213/list/comment/load';
    }

    public function getPostID()
    {
        return $this->getRequest()->getParam('post_id');
    }

    public function getFormAction()
	{
		return '/Magento213/list/comment/save';
	}

    public function getUserId()
    {
        $user = 0;
        $check = $this->customerSession->getCustomer()->getId();
        if($check != null)
                return $check;
        else 
                return $user;
    }

}