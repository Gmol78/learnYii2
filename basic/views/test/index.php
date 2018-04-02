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
    <hr>
    <p>
        Обход свойств объекта Prodact с поиощью foreach 
    </p>
    <p>
    <?php foreach ($data as $key => $value): ?>
        <p>
            свойство: <?= $key ?> значение: <?= $value ?>
        </p>
    <?php endforeach; ?>
    <hr> 
    <p>
        Использование DetailView::widget
    </p>
    <?= yii\widgets\DetailView::widget(['model' => $data]); ?>
    <p>
        порядок вывода свойств через DetailView::widget произвольный?
    </p>
    <code> <? = __FILE__ ?></code>
</div>
