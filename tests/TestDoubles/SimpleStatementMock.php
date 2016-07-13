<?php

namespace legolasbo\CodeGeneration\tests\TestDoubles;

use legolasbo\CodeGeneration\Statements\Statement;

class SimpleStatementMock extends Statement {

  /**
   * @var
   */
  private $text;

  public function __construct($text = 'statement') {
    $this->text = $text;
  }

  public function render() {
    return $this->text;
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    // TODO: Implement getTemplateName() method.
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    // TODO: Implement getRenderContext() method.
  }
}
