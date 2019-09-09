<?php

  /**
   * Session-based storage
   */
  class Store {

    // constructor; initialize PHP session
    public function __construct()
    {
      session_start();
    }

    public function get(string $key)
    {
      return $_SESSION[$key];
    }

    public function set(string $key, string $value)
    {
      $_SESSION[$key] = $value;
    }

    public function destroy()
    {
      session_destroy();
    }

  }

?>
