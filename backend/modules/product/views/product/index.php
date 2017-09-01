<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\product\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $category backend\modules\category\models\Category */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'name',
                    \yii\helpers\ArrayHelper::map(\common\models\db\Product::find()->select(['name'],
                        'DISTINCT')->all(), 'name', 'name'),
                    ['class' => 'form-control', 'prompt' => '']
                ),
            ],

            [
                'attribute' => 'category_id',
                'format' => 'text',
                'value' => function ($model) {
                    return \yii\helpers\ArrayHelper::getValue($model['category'], 'name');
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'category_id',
                    \yii\helpers\ArrayHelper::map($category, 'id', 'name'),
                    ['class' => 'form-control', 'prompt' => '']
                ),
            ],

            'quantity',
            [
                'attribute' => 'provider',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'provider',
                    \yii\helpers\ArrayHelper::map(\common\models\db\Product::find()->select(['provider'],
                        'DISTINCT')->all(), 'provider', 'provider'),
                    ['class' => 'form-control', 'prompt' => '']
                ),
            ],
            [
                'attribute' => 'dt_delivery',
                'format' => ['date', 'dd.MM.Y'],
                'filter' => \yii\jui\DatePicker::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'dt_delivery',
                        'language' => 'ru-RU',
                        'dateFormat' => 'php:d/m/Y',
                    ]
                ),
            ],

            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
