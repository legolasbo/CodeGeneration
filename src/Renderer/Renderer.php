<?php

namespace legolasbo\CodeGeneration\Renderer;

use legolasbo\CodeGeneration\Twig\Extensions\Indentation\Indent;
use legolasbo\CodeGeneration\Twig\Extensions\Indentation\Lexer;
use Twig_Environment;

class Renderer extends Twig_Environment {
  /**
   * @param array $options
   */
  public function __construct(array $options = []) {
    $loader = new \Twig_Loader_Filesystem(__DIR__ . '/Templates');
    $options = array_merge($options, ['autoescape' => FALSE]);
    parent::__construct($loader, $options);

    $this->addExtension(new Indent());
    $this->setLexer(new Lexer($this));
  }
}
