<?php

namespace Drupal\converter\Controller;

class ConverterController {
  public function run(){
    $query = \Drupal::database()->select('currency', 'cur');
    $query->fields('cur', ['currency_name', 'currency_value']);
    $result = $query->execute()->fetchAll();
    $results = [];
    $results[] = [
      '#theme' => 'converter_admin_page',
      '#items' => $result,
    ];

    return $results;
  }
}
