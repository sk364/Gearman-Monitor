<?php

class WorkerMonitor {

  /**
   * Row name to search in the provided data
   *
   */
  private $workerRowName = 'capable_workers';

  /**
   * Method to monitor Gearman workers' status.
   * Sends notification through integrated API(s) (eg. Slack) when the worker has failed.
   *
   * @param `array` $data key-value association map of worker data.
   *
   */
  public function monitor($data) {
    foreach ($data as $functionItem) {
      if ($functionItem[$this->workerRowName] == 0) {
      }
    }
  }
}

?>
