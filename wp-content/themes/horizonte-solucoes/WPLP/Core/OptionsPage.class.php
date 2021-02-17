<?php
  namespace WPLP\Core;
  
  /**
   * Creates a new interface to acf options page.
   * 
   * This class must be extended and files must be in /Site/Options directory.
   */
  abstract class OptionsPage {
    private $key = '';

    /**
     * Helper function to return conditional arguments based on options page.
     *
     * @param string $key - string containing the options page key.
     * @return array conditional array
     */
    public static function isEqualTo($key){
      return [
				'param' => 'options_page',
				'operator' => '==',
				'value' => $key,
      ];
    }
  }