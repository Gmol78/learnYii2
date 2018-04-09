<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $created_at
 */
class Product extends \yii\db\ActiveRecord {
    
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_CREATE = 'create';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'price'], 'required'],
            ['name', 'trim'],
            ['name', 'filter', 'filter' => function($value) {
                    return strip_tags($value);
                }],
            [['created_at'], 'safe'],
            ['price', 'integer', 'min' => 0, 'max' => 1000],
            ['name', 'string', 'max' => 20]
        ];
    }
    
    public function scenarios() {
        $scnr = parent::scenarios();
        $scnr['default'] = ['name'];
        $scnr['update'] = ['price'];
        $scnr['create'] = ['id','name', 'price', 'created_at'];
        return $scnr;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }

}
