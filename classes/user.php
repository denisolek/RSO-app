<?php
class UserService
{
    private $_id;
    private $_name;
    private $_surname;
    private $_nip;
    private $_pesel;
    private $_address;
    private $_avatar;

    function __construct($id, $name, $surname, $nip, $pesel, $address, $avatar)
    {
      $this->_id = $id;
      $this->_name = $name;
      $this->_surname = $surname;
      $this->_nip = $nip;
      $this->_pesel = $pesel;
      $this->_address = $address;
      $this->_avatar = $avatar;
    }
}
