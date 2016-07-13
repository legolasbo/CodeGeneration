<?php

namespace legolasbo\CodeGeneration;

use legolasbo\CodeGeneration\Statements\Renderable;

class StringValue extends Renderable {
  /** @var string */
  private $value;
  /**
   * @var
   */
  private $doubleQuoted;

  /**
   * StringValue constructor.
   * @param string $value
   */
  public function __construct($value, $doubleQuoted = FALSE) {
    $this->value = $value;
    $this->doubleQuoted = $doubleQuoted;
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    return 'StringValue.twig';
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    return [
      'string' => $this->value,
      'quote' => $this->doubleQuoted ? '"' : "'",
    ];
  }
}
