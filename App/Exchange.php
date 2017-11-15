<?php

/**
 * Created by PhpStorm.
 * User: Mawel
 * Date: 15/11/17
 * Time: 21:37
 */

require 'Product.php';

class Exchange
{
    private $receiver;
    private $product;
    private $owner;
    private $starting_date;
    private $ending_date;
    private $emailSender;
    private $DBConnection;

    /**
     * Exchange constructor.
     * @param $receiver
     * @param $product
     * @param $owner
     * @param $starting_date
     * @param $ending_date
     * @param $emailSender
     * @param $DBConnection
     */
    public function __construct($receiver, $product, $owner, $starting_date, $ending_date, $emailSender, $DBConneciton)
    {
        $this->receiver = $receiver;
        $this->product = $product;
        $this->owner = $owner; //Ca marche ça ?
        $this->starting_date = $starting_date;
        $this->ending_date = $ending_date;
        $this->emailSender = $emailSender;
        $this->DBConnection = $DBConnection;
    }
/*
- Si le receiver est mineur, lui envoyer un mail
*/
    public function isValid(){
        return isset($this->receiver)
            && $this->receiver->isValid()
            && isset($this->product)
            && $this->product->isValid()
            && checkDates();
    }

    public function checkDates(){
        return strtotime($this->starting_date) > strtotime(date(DATE_RSS))
            && strtotime($this->starting_date) > strtotime($this->ending_date);
    }
    //Enregistrer
    public function save(){

    }

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getStartingDate()
    {
        return $this->starting_date;
    }

    /**
     * @param mixed $starting_date
     */
    public function setStartingDate($starting_date)
    {
        $this->starting_date = $starting_date;
    }

    /**
     * @return mixed
     */
    public function getEndingDate()
    {
        return $this->ending_date;
    }

    /**
     * @param mixed $ending_date
     */
    public function setEndingDate($ending_date)
    {
        $this->ending_date = $ending_date;
    }

    /**
     * @return mixed
     */
    public function getEmailSender()
    {
        return $this->emailSender;
    }

    /**
     * @param mixed $emailSender
     */
    public function setEmailSender($emailSender)
    {
        $this->emailSender = $emailSender;
    }

    /**
     * @return mixed
     */
    public function getDBConneciton()
    {
        return $this->DBConneciton;
    }

    /**
     * @param mixed $DBConneciton
     */
    public function setDBConneciton($DBConneciton)
    {
        $this->DBConneciton = $DBConneciton;
    }
}