<?php

use app\models\Person;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\PersonSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email_id:email',
            'created_at',
            'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{contact} {view} {update} {delete}',
                'buttons' => [
                    'contact' => function ($url, $model, $key) {
                        return Html::a('', ['/contact', 'person_id' => $model['id']], ['class' => 'fad fa-address-card']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
