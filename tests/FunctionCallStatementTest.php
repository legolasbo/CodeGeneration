<?php

namespace legolasbo\CodeGeneration\tests;

use legolasbo\CodeGeneration\Statements\FunctionCall;

class FunctionCallStatementTest extends RenderTestBase {

  /**
   * @test
   */
  public function canGenerateFunctionCallWithoutArguments() {
    $sut = new FunctionCall('function');

    $this->assertSame("function()\n", $this->render($sut));
  }

  /**
   * @test
   */
  public function canGenerateFunctionCallWithSingleArgument() {
    $sut = new FunctionCall('function', '$arg');
    $this->assertSame("function(\$arg)\n", $this->render($sut));
  }

  /**
   * @test
   */
  public function canGenerateFunctionCallWithMultipleArguments() {
    $sut = new FunctionCall('function', '$arg', '$arg2', '$arg3');
    $this->assertSame("function(\$arg, \$arg2, \$arg3)\n", $this->render($sut));
  }

  /**
   * @test
   */
  public function newlineCanBeDisabled() {
    $sut = FunctionCall::createWithoutNewline('function');
    $this->assertSame("function()", $this->render($sut));
  }
}
