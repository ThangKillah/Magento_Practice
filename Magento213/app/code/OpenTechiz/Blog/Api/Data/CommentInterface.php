<?php
namespace OpenTechiz\Blog\Api\Data;
interface CommentInterface
{
    const COMMENT_ID       = 'comment_id';
    const CONTENT       = 'content';
    const CREATION_TIME = 'created_at';
    const UPDATE_TIME   = 'updated_at';
    const STATUS     = 'status';
    const POST_ID = 'post_id';
    const USER_ID = 'user_id';
    
//    public function getId();
//    public function getContent();
//    public function getCreationTime();
//    public function getUpdateTime();
//    public function getStatus();
//    public function getUserId();
//    public function getPostId();
//
//    public function setId($arg);
//    public function setContent($arg);
//    public function setCreationTime($arg);
//    public function setUpdateTime($arg);
//    public function setStatus($arg);
//    public function setUserId($arg);
//    public function setPostId($arg);
}
