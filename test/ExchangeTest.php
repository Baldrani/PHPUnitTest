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

        $mockedProduct = $this->getMock('Product', array('isValid'), array(null, null, null, null, null, null, null));
        $mockedProduct->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $mockedOwner = $this->getMock('User', array('isValid'), array(null, null, null, null));
        $mockedOwner->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $this->exchange = new Exchange($mockedReceiver, $mockedProduct, $mockedOwner, Date(DATE_RSS), time() + (365 * 24 * 60 * 60), "mael.mayon@free.fr");
    }

    protected function tearDown()
    {
        $this->exchange = NULL;
    }

}