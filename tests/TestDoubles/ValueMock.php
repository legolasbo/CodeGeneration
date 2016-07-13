<?php

namespace legolasbo\CodeGeneration\tests\TestDoubles;

use legolasbo\CodeGeneration\Value;

class ValueMock implements Value {
  /** @var string */
  private $value;

  /**
   * ValueMock constructor.
   * @param string $value
   */
  public function __construct($value) {
    $this->value = $value;
  }

  public function __toString() {
    return $this->value;
  }
}
