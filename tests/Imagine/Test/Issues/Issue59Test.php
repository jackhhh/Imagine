<?php

namespace Imagine\Test\Issues;

use Imagine\Exception\RuntimeException;
use Imagine\Gd\Imagine;

/**
 * @group ext-gd
 */
class Issue59Test extends \PHPUnit\Framework\TestCase
{
    private function getImagine()
    {
        try {
            $imagine = new Imagine();
        } catch (RuntimeException $e) {
            $this->markTestSkipped($e->getMessage());
        }

        return $imagine;
    }

    public function testShouldResize()
    {
        $imagine = $this->getImagine();
        $new = sys_get_temp_dir() . '/sample.jpeg';

        $imagine
            ->open('tests/Imagine/Fixtures/sample.gif')
            ->save($new)
        ;

        unlink($new);
    }
}
