<?php

namespace legolasbo\CodeGeneration\Statements;

use legolasbo\CodeGeneration\Variables\Variable;

class Assignment extends Statement {
  /** @var \legolasbo\CodeGeneration\Variables\Variable */
  private $variable;
  /** @var \legolasbo\CodeGeneration\Statements\Renderable */
  private $value;

  /**
   * Assignment constructor.
   * @param $variable
   * @param $value
   */
  public function __construct(Variable $variable, Renderable $value) {
    $this->variable = $variable;
    $this->value = $value;
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    return 'Assignment.twig';
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    return [
      'variable' => $this->variable,
      'value' => $this->value,
    ];
  }
}
