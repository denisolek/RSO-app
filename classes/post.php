<?php
class PostService
{
    private $_user;
    private $_text;

    function __construct($user, $text)
    {
      $this->_user = $user;
      $this->_text = $text;
    }
}
