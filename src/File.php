<?php

namespace legolasbo\CodeGeneration;

use legolasbo\CodeGeneration\Renderer\Renderer;
use legolasbo\CodeGeneration\Statements\Statement;

class File {
  /** @var array */
  private $statements = [];
  /** @var \legolasbo\CodeGeneration\Renderer\Renderer */
  private $renderer;

  /**
   * @param \legolasbo\CodeGeneration\Renderer\Renderer $renderer
   */
  public function __construct(Renderer $renderer) {
    $this->renderer = $renderer;
  }

  /**
   * @param \legolasbo\CodeGeneration\Statements\Statement $statement
   */
  public function addStatement(Statement $statement) {
    $this->statements[] = $statement;
  }

  /**
   * @return string
   */
  public function __toString() {
    return $this->render();
  }

  /**
   * @return string
   */
  public function render() {
    return $this->renderer->render('File.php.twig', ['statements' => $this->statements]);
  }
}
