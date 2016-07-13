<?php

namespace legolasbo\CodeGeneration\tests;

use legolasbo\CodeGeneration\Statements\Arrays\ArrayDefinition;

class ArrayDefinitionTest extends RenderTestBase {
  /**
   * @test
   */
  public function emptyArrayGeneration() {
    $sut = ArrayDefinition::fromArray([]);
    $this->assertEquals('[]', $this->render($sut));
  }

  /**
   * @test
   */
  public function singleValueArray() {
    $sut = ArrayDefinition::fromArray(['test']);
    $this->assertMatchesFixture(__FUNCTION__, $sut);
  }

  /**
   * @param $filename
   * @param $sut
   */
  protected function assertMatchesFixture($filename, ArrayDefinition $sut) {
    $filename = __DIR__ . '/fixtures/' . $filename . '.php';
    $this->assertEquals(trim(file_get_contents($filename)), $this->render($sut));
  }

  /**
   * @test
   */
  public function multiValueArray() {
    $sut = ArrayDefinition::fromArray(['test', 'test2']);
    $this->assertMatchesFixture(__FUNCTION__, $sut);
  }

  /**
   * @test
   */
  public function singleKeyValueArray() {
    $sut = ArrayDefinition::fromArray(['key' => 'value']);
    $this->assertMatchesFixture(__FUNCTION__, $sut);
  }

  /**
   * @test
   */
  public function multiKeyValueArray() {
    $sut = ArrayDefinition::fromArray(['key' => 'value', 'key2' => 'value2']);
    $this->assertMatchesFixture(__FUNCTION__, $sut);
  }

  /**
   * @test
   */
  public function nestedArray() {
    $sut = ArrayDefinition::fromArray(['key' => ['subkey' => 'value']]);
    $this->assertMatchesFixture(__FUNCTION__, $sut);
  }

  /**
   * @test
   */
  public function deepNestedArray() {
    $sut = ArrayDefinition::fromArray(
      [
        'key' => ['subkey' => ['AnotherSubKey' => 'value']],
        'key2' => ['subkey2' => 'value2'],
      ]
    );
    $this->assertMatchesFixture(__FUNCTION__, $sut);
  }
}
