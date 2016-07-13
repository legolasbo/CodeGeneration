<?php

namespace legolasbo\CodeGeneration\Twig\Extensions\Indentation;

use Twig_Lexer;
use Twig_Token;

class Lexer extends Twig_Lexer {

  private $indent = FALSE;
  private $indentation = '';

  public function lexVar() {
    $lastToken = end($this->tokens);
    if ($lastToken->getType() === Twig_Token::VAR_START_TYPE) {
      $previousToken = prev($this->tokens);
      if ($previousToken && $previousToken->getType() === Twig_Token::TEXT_TYPE) {
        $parts = explode("\n", $previousToken->getValue());
        if (trim(end($parts)) === '') {
          $this->indent = TRUE;
          $this->indentation = end($parts);
        }
      }
    }

    parent::lexVar();
  }

  public function pushToken($type, $value = '') {
    switch ($type) {
      case Twig_Token::VAR_END_TYPE:
        if ($this->indent) {
          parent::pushToken(Twig_Token::PUNCTUATION_TYPE, '|');
          parent::pushToken(Twig_Token::NAME_TYPE, 'indent');
          parent::pushToken(Twig_Token::PUNCTUATION_TYPE, '(');
          parent::pushToken(Twig_Token::STRING_TYPE, $this->indentation);
          parent::pushToken(Twig_Token::PUNCTUATION_TYPE, ')');
          $this->indent = FALSE;
        }
        break;
    }
    parent::pushToken($type, $value);
  }

}
