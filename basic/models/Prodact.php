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
 * @param type $id
 * @param type $name
 * @param type $category
 * @param type $price
 */
    function setPropertes ($id=0, $name='', $category='', $price=0){
        $this->id =$id;
        $this->name=$name;
        $this->category=$category;
        $this->price=$price;
    }
    
    /**
     * 
     * @return type
     */
    public function attributeLabels() {
        return ['category' => 'категория'];
    }
}
