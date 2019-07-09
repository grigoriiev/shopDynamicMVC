<?php
//namespace Controller;



class BaseController
{
    public $qerybuilder;
    public  $auth;
    public $validator;
    public  $imagemanager;
    public $cart;



 public function __construct($qerybuilder, $auth,$validator ,$imagemanager,$cart){
$this->qerybuilder=$qerybuilder;
$this->auth=$auth;
$this->validator = $validator;
$this->imagemanager= $imagemanager;
$this->cart=$cart;


 }












}