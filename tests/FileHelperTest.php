<?php

namespace Webberman\Helper\Tests;

use Webberman\Helper\Helper;

class FileHelperTest extends BaseTestCase
{
    public function test_file_helper_exists()
    {
        $file = ( new Helper )->exists('file');
        $this->assertFileExists($file);
    }
}
