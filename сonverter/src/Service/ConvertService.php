<?php

namespace Drupal\converter\Service;
/**
 * Class ConvertService
 *
 * @package Drupal\converter\Service
 */

class ConvertService {

  public function convert ($price, $convertFrom, $convertAt){
    $convertFromValue = $this->selectCurrencyValue($convertFrom);
    $convertAtValue = $this->selectCurrencyValue($convertAt);
    return $price/$convertFromValue*$convertAtValue;
  }

  private function selectCurrencyValue ($currency){
    $query = \Drupal::database()->select('currency', 'cur');
    $query->addField('cur', 'currency_value');
    $query->condition('cur.currency_name', $currency);
    $result = $query->execute()->fetchField();
    return $result;
  }
}