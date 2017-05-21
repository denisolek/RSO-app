<?php
class UserService
{
    private $_name;
    private $_surname;
    private $_address;
    private $_nip;
    private $_pesel;
    private $_avatar;

    function __construct($name, $surname, $address, $nip, $pesel, $avatar)
    {
      $this->_name = $name;
      $this->_surname = $surname;
      $this->_address = $address;
      $this->_nip = $nip;
      $this->_pesel = $pesel;
      $this->_avatar = $avatar;
    }
}
