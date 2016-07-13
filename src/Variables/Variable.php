<?php

namespace legolasbo\CodeGeneration\Variables;

use legolasbo\CodeGeneration\Statements\Renderable;

class Variable extends Renderable {
  /** string */
  protected $name;

  public function __construct($name) {
    $this->name = $name;
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    return 'Variables/Variable.twig';
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    return ['variable' => ['name' => $this->name]];
  }
}
