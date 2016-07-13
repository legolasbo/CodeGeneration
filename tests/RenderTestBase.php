<?php
namespace legolasbo\CodeGeneration\tests;

use legolasbo\CodeGeneration\Renderer\Renderer;
use legolasbo\CodeGeneration\Statements\Renderable;

abstract class RenderTestBase extends \PHPUnit_Framework_TestCase {
  /** @var Renderer */
  protected $renderer;

  /**
   * @return \legolasbo\CodeGeneration\File
   */
  public function setUp() {
    $this->renderer = new Renderer();
  }

  protected function render(Renderable $sut) {
    $sut->setRenderer($this->renderer);
    return $sut->render();
  }
}
