<?php

namespace legolasbo\CodeGeneration\Twig\Extensions\Indentation;

use Twig_Extension;

class Indent extends Twig_Extension {
  public static function indent($value, $indentation) {
    $parts = explode("\n", $value);

    for ($i = 1; $i < count($parts); $i++) {
      $parts[$i] = $indentation . $parts[$i];
    }

    $value = implode("\n", $parts);

    return $value;
  }

  /**
   * Returns the name of the extension.
   *
   * @return string The extension name
   */
  public function getName() {
    return 'indent';
  }

  public function getFilters() {
    return [
      new \Twig_SimpleFilter('indent', [self::class, "indent"])
    ];
  }
}
