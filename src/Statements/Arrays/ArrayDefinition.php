<?php

namespace legolasbo\CodeGeneration\Statements\Arrays;

use legolasbo\CodeGeneration\Statements\Renderable;
use legolasbo\CodeGeneration\Statements\Statement;
use legolasbo\CodeGeneration\StringValue;

class ArrayDefinition extends Statement {
  /** @var bool */
  protected $hasNewLine = FALSE;
  /** @var Renderable[] */
  private $definition;
  /** @var bool */
  private $forceMultiLine;

  /**
   * ArrayDefinition constructor.
   * @param Renderable[] $definition
   * @param bool $forceMultiLine
   */
  protected function __construct(array $definition = [], $forceMultiLine = FALSE) {
    $this->hasNewLine = FALSE;
    $this->definition = $this->prepareDefinition($definition);
    $this->forceMultiLine = $forceMultiLine;
  }

  public static function fromArray(array $input, $forceMultiLine = FALSE) {
    $isKeyedArray = self::determineKeyedArray($input);

    $definition = [];
    foreach ($input as $key => $value) {
      if (is_array($value)) {
        $forceMultiLine = TRUE;
        $value = self::fromArray($value, $forceMultiLine);
      }
      elseif (is_string($value)) {
        $value = new StringValue($value);
      }

      if ($isKeyedArray) {
        $definition[] = new KeyValuePair($key, $value);
      }
      else {
        $definition[] = $value;
      }
    }

    return new static($definition, $forceMultiLine);
  }

  /**
   * @param array $definition
   * @return array
   */
  public function prepareDefinition(array $definition) {
    return $definition;
  }

  /**
   * @param array $input
   * @return bool
   */
  private static function determineKeyedArray(array $input) {
    $keys = array_keys($input);
    for ($i = 0; $i < count($keys); $i++) {
      if ($i !== $keys[$i]) {
        return TRUE;
      }
    }

    return FALSE;
  }

  /**
   * @return bool
   */
  protected function isMultiline() {
    if ($this->forceMultiLine) {
      return TRUE;
    }

    if (count($this->definition) > 1) {
      return TRUE;
    }

    if (is_array(reset($this->definition))) {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    if ($this->isMultiline()) {
      return 'Array.MultiLine.twig';
    }
    else {
      return 'Array.twig';
    }
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    return [
      'key_value_pairs' => $this->definition,
    ];
  }
}
