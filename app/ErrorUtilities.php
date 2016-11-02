<?php
namespace Bretuobay\App;

trait ErrorUtilities {

  /**
   * @return array
   * generic return array for json on success
   */
  public function retSuccess()
  {

      return [
          'code' => 200,
          'success' => true,
          'message' => 'Operation was successful'
      ];
  }

  /**
   * @return array
   * generic return array for failure
   */
  public function retFailure()
  {

      return [
          'code' => 200,
          'success' => false,
          'message' => 'Operation was not successful'
      ];
  }



}
