<?php

/**
 * Created by PhpStorm.
 * User: Mawel
 * Date: 15/11/17
 * Time: 22:42
 */
require '../App/Exchange.php';

//Change this variable to check if age is too young
define("MAIL", "mael.mayon@free.fr");


class ExchangeTest extends PHPUnit_Framework_TestCase
{
    private $exchange;

    public function testSaveNominal(){
        $result = $this->exchange->save();
        $this->assertTrue($result);
    }

    public function testAgeReceiverTooYoung(){
        $mockedReceiverNotValid = $this->getMock('User', array('isValid'), array(MAIL, null, null, 13));
        $mockedReceiverNotValid->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $this->exchange->setReceiver($mockedReceiverNotValid);
        $result = $this->exchange->save();
        $this->assertFalse($result);
    }

    protected function setUp()
    {
        $mockedReceiver = $this->getMock('User', array('isValid'), array(MAIL, null, null, 18));
        $mockedReceiver->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $mockedProduct = $this->getMock('Product', array('isValid'), array(null, null));
        $mockedProduct->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $mockedOwner = $this->getMock('User', array('isValid'), array(null, null, null, null));
        $mockedOwner->expects($this->any())->method('isValid')->will($this->returnValue(true));

        $mockedDBConnection = $this->getMock('DatabaseConnection', array('isConnected'));
        $mockedDBConnection->expects($this->any())->method('isConnected')->will($this->returnValue(true));

        $this->exchange = new Exchange($mockedReceiver, $mockedProduct, $mockedOwner, Date(DATE_RSS), time() + (365 * 24 * 60 * 60), "mael.mayon@free.fr", $mockedDBConnection);
    }

    protected function tearDown()
    {
        $this->exchange = NULL;
    }

}