<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class GoldenMasterTest extends TestCase {

    function testGenerateOutput() {
        $output = $this->generateOutput('texttest_fixture_legacy.php');
        $output2 = $this->generateOutput('texttest_fixture.php');
        //var_dump($output);
        //var_dump($output2);
        $this->assertEquals($output, $output2);
    }


    public function generateOutput($fixtureFileName)
    {
        ob_start();
        $argv = ['test', 10];
        require_once __DIR__ . '/../fixtures/' . $fixtureFileName . '';
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

}

?>