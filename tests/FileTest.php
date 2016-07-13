<?php

namespace legolasbo\CodeGeneration\tests;

use legolasbo\CodeGeneration\File;
use legolasbo\CodeGeneration\tests\TestDoubles\SimpleStatementMock;

class PhpFileTest extends RenderTestBase {
  /** @var File */
  private $file;

  public function setUp() {
    parent::setUp();
    $this->file = new File($this->renderer);
  }

  /**
   * @test
   */
  public function givenNoStatements_onlyPrintsOpeningPhpTag() {
    $this->assertEquals("<?php\n\n", $this->file->render());
  }

  /**
   * @test
   */
  public function givenStatement_printsOpeningPhpTagAndStatement() {
    $this->file->addStatement(new SimpleStatementMock());
    $this->assertEquals("<?php\n\nstatement", $this->file->render());
  }

  /**
   * @test
   */
  public function givenMultipleStatements_printsOpeningPhpTagAndSequentialStatements() {
    $this->file->addStatement(new SimpleStatementMock('s1'));
    $this->file->addStatement(new SimpleStatementMock('s2'));
    $this->assertEquals("<?php\n\ns1s2", $this->file->render());
  }


}
