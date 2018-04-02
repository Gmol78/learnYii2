<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Prodact
 *
 * @author igor
 */
class Prodact extends \yii\base\Model {
    public $id;
    public $name;
    public $category;
    public $price;
/**
 * 
 * @param int $id
 * @param string $name
 * @param string $category
 * @param int $price
 */
    function setPropertes ($id=0, $name='', $category='', $price=0){
        $this->id =$id;
        $this->name=$name;
        $this->category=$category;
        $this->price=$price;
    }
    
    /**
     * 
     * @return array
     */
    public function attributeLabels() {
        return ['category' => 'категория'];
    }
}
