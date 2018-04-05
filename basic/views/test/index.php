<?php
/* @var $this yii\web\View */
/* @var $data \app\models\Prodact */

use yii\helpers\Html;

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the Test page! 
    </p>
    <?= $data ?>
    <code> <? = __FILE__ ?></code>
</div>
