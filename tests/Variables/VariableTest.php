<?php

namespace legolasbo\CodeGeneration\tests\Variables;

use legolasbo\CodeGeneration\tests\RenderTestBase;
use legolasbo\CodeGeneration\Variables\Variable;

class VariableTest extends RenderTestBase {

  /**
   * @test
   */
  public function rendersVariableCorrectly() {
    $sut = new Variable('name');

    $this->assertEquals('$name', $this->render($sut));
  }
}
