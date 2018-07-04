<?php
namespace OpenTechiz\Blog\Api\Data;
interface PostInterface
{
    const POST_ID       = 'post_id';
    const URL_KEY       = 'url_key';
    const TITLE         = 'title';
    const CONTENT       = 'content';
    const CREATION_TIME = 'created_at';
    const UPDATE_TIME   = 'updated_at';
    const IS_ACTIVE     = 'status';
    public function getId();
    public function getUrlKey();
    public function getTitle();
    public function getContent();
    public function getCreationTime();
    public function getUpdateTime();
    public function isActive();
    public function setId($id);
    public function setUrlKey($url_key);
    public function getUrl();
    public function setTitle($title);
    public function setContent($content);
    public function setCreationTime($creationTime);
    public function setUpdateTime($updateTime);
    public function setIsActive($isActive);
}
