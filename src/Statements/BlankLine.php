<?php

namespace legolasbo\CodeGeneration\Statements;

class BlankLine extends Renderable {

  public function render() {
    return "\n";
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    return;
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    return [];
  }
}
