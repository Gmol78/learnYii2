<?php



namespace app\components;

/**
 * Description of TestService
 *
 * @author igor
 */
class TestService extends \yii\base\Component {
    public $property = 'default';
    
    /**
     * 
     * @return $this->property
     */
    
    function getProperty () {
        return $this->property;
    }
}
