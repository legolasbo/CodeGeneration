<?php

namespace legolasbo\CodeGeneration\Statements\Arrays;

use legolasbo\CodeGeneration\Statements\Renderable;
use legolasbo\CodeGeneration\StringValue;

class KeyValuePair extends Renderable {
  /** @var int|string */
  private $key;
  /** @var Renderable */
  private $value;

  /**
   * KeyValuePair constructor.
   * @param int|string $key
   * @param mixed $value
   */
  public function __construct($key, Renderable $value) {
    if (is_string($key)) {
      $key = new StringValue($key);
    }
    $this->key = $key;
    $this->value = $value;
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    return 'KeyValuePair.twig';
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    return [
      'pair' => [
        'key' => $this->key,
        'value' => $this->value,
      ]
    ];
  }
}
