<?php

namespace legolasbo\CodeGeneration\tests;

use legolasbo\CodeGeneration\Statements\BlankLine;

class BlankLineTest extends \PHPUnit_Framework_TestCase {

  /**
   * @test
   */
  public function rendersJustANewlineCharacter() {
    $sut = new BlankLine();
    $this->assertEquals("\n", $sut->render());
  }

}
