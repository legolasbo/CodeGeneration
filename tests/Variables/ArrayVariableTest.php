<?php

namespace legolasbo\CodeGeneration\tests\Variables;

use legolasbo\CodeGeneration\StringValue;
use legolasbo\CodeGeneration\tests\RenderTestBase;
use legolasbo\CodeGeneration\Variables\ArrayVariable;

class ArrayVariableTest extends RenderTestBase {
  /**
   * @test
   */
  public function givenNoIndices_rendersNoIndices() {
    $sut = new ArrayVariable('name', []);
    $this->assertEquals('$name', $this->render($sut));
  }

  /**
   * @test
   */
  public function givenIndex_rendersIndex() {
    $sut = new ArrayVariable('name', [new StringValue('index')]);
    $this->assertEquals('$name[\'index\']', $this->render($sut));
  }
}
