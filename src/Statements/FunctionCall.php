<?php

namespace legolasbo\CodeGeneration\Statements;

class FunctionCall extends Statement {
  /** @var string */
  private $functionName;
  /** @var array */
  private $args;

  /**
   * FunctionCallStatement constructor.
   * @param string $functionName
   */
  public function __construct($functionName) {
    $this->functionName = $functionName;

    $this->args = array_slice(func_get_args(), 1);
  }

  public static function create($functionName) {
    $instance = new static($functionName);
    foreach (array_slice(func_get_args(), 1) as $arg) {
      $instance->addArgument($arg);
    }
    return $instance;
  }

  private function addArgument($arg) {
    $this->args[] = $arg;
  }

  /**
   * @param $functionName
   * @return mixed
   */
  public static function createWithoutNewline($functionName) {
    /** @var FunctionCall $instance */
    $instance = call_user_func_array([
      __CLASS__,
      'self::create'
    ], func_get_args());
    $instance->setNewline(FALSE);
    return $instance;
  }

  private function setNewline($hasNewline = TRUE) {
    $this->hasNewLine = $hasNewline;
  }

  /**
   * @return string
   */
  protected function getTemplateName() {
    return 'FunctionCall.twig';
  }

  /**
   * @return array
   */
  protected function getRenderContext() {
    return [
      'function' => (object) [
        'name' => $this->functionName,
        'arguments' => $this->args,
      ],
    ];
  }
}
