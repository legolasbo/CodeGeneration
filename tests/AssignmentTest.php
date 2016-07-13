<?php

namespace legolasbo\CodeGeneration\tests;

use legolasbo\CodeGeneration\Statements\Assignment;
use legolasbo\CodeGeneration\StringValue;
use legolasbo\CodeGeneration\Variables\ArrayVariable;
use legolasbo\CodeGeneration\Variables\Variable;

class AssignmentTest extends RenderTestBase {
  /**
   * @test
   */
  public function assignmentTakesVariableNameAndValue() {
    $sut = new Assignment(new Variable('variable'), $this->getValue());
    $this->assertSame("\$variable = 'value';\n", $this->render($sut));
  }

  /**
   * @test
   */
  public function assignmentTakesArrayAndValue() {
    $sut = new Assignment(new ArrayVariable('variable', [new StringValue('some_key')]), $this->getValue());
    $this->assertSame("\$variable['some_key'] = 'value';\n", $this->render($sut));
  }

  /**
   * @test
   */
  public function givenValueObject_doesNotQuoteValue() {
    $sut = new Assignment(new Variable('variable'), $this->getValue());
    $this->assertEquals("\$variable = 'value';\n", $this->render($sut));
  }

  /**
   * @return \legolasbo\CodeGeneration\StringValue
   */
  public function getValue() {
    return new StringValue('value');
  }

}
