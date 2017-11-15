<?php

/**
 * Created by PhpStorm.
 * User: Mawel
 * Date: 15/11/17
 * Time: 22:42
 */
require '../App/Exchange.php';

class ExchangeTest extends PHPUnit_Framework_TestCase
{
    private $exchange;

    public function testIsValidNominal(){
        $result = $this->exchange->isValid();
        $this->assertTrue($result);
    }



    protected function setUp()
    {
        $mockedReceiver = $this->getMock('User', array('isValid'), array(null, null, null, null));
        $mockedReceiver->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $mockedProduct = $this->getMock('Product', array('isValid', array(null, null, null, null, null, null, null)));
        $mockedProduct->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $this->exchange = new Exchange("un exchange", $mockedReceiver, $mockedProduct, $mockedProduct->owner, Date(DATE_RSS), Date(DATE_RSS), "mael.mayon@free.fr", null);
    }

    protected function tearDown()
    {
        $this->exchange = NULL;
    }

}