<?php

namespace legolasbo\CodeGeneration\Variables;

class ArrayVariable extends Variable {
  /** Renderable[] */
  private $indices;

  public function __construct($name, array $indices) {
    parent::__construct($name);
    $this->indices = $indices;
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    return 'Variables/ArrayVariable.twig';
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    return [
      'variable' => [
        'name' => $this->name,
        'indices' => $this->indices,
      ],
    ];
  }
}
