<?php

namespace legolasbo\CodeGeneration\tests;

use legolasbo\CodeGeneration\StringValue;

class StringValueTest extends RenderTestBase {
  /**
   * @test
   */
  public function outputsSingleQuotedValueByDefault() {
    $sut = new StringValue('value');
    $this->assertEquals("'value'", $this->render($sut));
  }

  /**
   * @test
   */
  public function outputsDoubleQuotedValueIfConfiguredToDoSo() {
    $sut = new StringValue('value', TRUE);
    $this->assertEquals('"value"', $this->render($sut));
  }
}
