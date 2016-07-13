<?php

namespace legolasbo\CodeGeneration\Statements;

abstract class Statement extends Renderable {
  protected $hasNewLine = TRUE;

  public function render() {
    $output = parent::render();

    if ($this->hasNewLine) {
      $output .= "\n";
    }

    return $output;
  }

}
