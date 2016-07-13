<?php

namespace legolasbo\CodeGeneration\Statements;

use legolasbo\CodeGeneration\Renderer\Renderer;
use legolasbo\CodeGeneration\StringValue;

abstract class Renderable {
  /** @var Renderer */
  protected $renderer;

  public function __toString() {
    return $this->render();
  }

  public function render() {
    return $this->renderer->render($this->getTemplateName(), $this->renderContext($this->getRenderContext()));
  }

  /**
   * @return string
   */
  protected abstract function getTemplateName();

  private function renderContext($renderContext) {
    foreach ($renderContext as &$context) {
      switch (TRUE) {
        case empty($context):
        case get_class($this) === StringValue::class;
          break;
        case $context instanceof Renderable:
          $context->setRenderer($this->renderer);
          $context = $context->render();
          break;
        case is_array($context) :
          $context = $this->renderContext($context);
      }
    }
    return $renderContext;
  }

  /**
   * @param \legolasbo\CodeGeneration\Renderer\Renderer $renderer
   */
  public function setRenderer(Renderer $renderer) {
    $this->renderer = $renderer;
  }

  /**
   * @return array
   */
  protected abstract function getRenderContext();
}
