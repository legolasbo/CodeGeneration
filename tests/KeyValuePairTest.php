<?php

namespace legolasbo\CodeGeneration\tests;


use legolasbo\CodeGeneration\Statements\Arrays\KeyValuePair;
use legolasbo\CodeGeneration\StringValue;

class KeyValuePairTest extends RenderTestBase {
  /**
   * @test
   */
  public function correctlyRendersScalarKeyValuePair() {
    $sut = new KeyValuePair('key', new StringValue('value'));

    $this->assertEquals("'key' => 'value'", $this->render($sut));
  }
}
