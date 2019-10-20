<?php

namespace App\Tests\Utils;

use App\Utils\ExtractionJson;
use PHPUnit\Framework\TestCase;
use SimpleXLSX;

class ExtractionJsonTest extends TestCase
{
    public function testIfFichierExcelExist(){
        $EJson = new ExtractionJson();
        $name_fichier = 'fichier.xlsx';

        $reponseAttendu = 'File not found fichier.xlsx';

        $this->assertEquals($reponseAttendu, $EJson->genereJson($name_fichier));
    }
}
