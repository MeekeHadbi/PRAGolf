<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 19/10/2019
 * Time: 22:13
 */

namespace App\Tests;

use App\Controller\XlsToJsonController;
use App\Repository\UploadRepository;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

class XlstoJsonControllerTest extends TestCase
{
    public function test(UploadRepository $uploadRepository)
    {
        $uh = new XlsToJsonController();
        $arg = $uploadRepository;
        $expectedHtmlTab = '(vide)';

        $this->assertEquals($expectedHtmlTab, $uh->xlsToJson($arg));

    }
}