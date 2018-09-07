<?php

namespace Drupal\parts_helper;

/**
 * Class PartsService.
 */
class PartsService {

  /**
   * Constructs a new PartsService object.
   */
  public function __construct() {

  }

  /*
   * Author: Pēteris Rautmanis, Wunder
   * Since:  07.09.2018
   * Sends a message to user with the user info. Or maybe not...
   */
  public function PartsFormSubmitMessage($name, $surname, $email){
      if (!empty($name) && !empty($surname) && !empty($email)){
          return "This is a service for: " . $name . " " . $surname . "At email address:  " . $email;
      }else {
          exit;
      }
  }

}
