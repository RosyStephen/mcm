<?php

use app\models\Contact;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\ContactSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Contact', ['create', 'person_id' => \Yii::$app->request->get('person_id')], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'person_id',
            'country_code',
            'phone_number',
            'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('', ['view', 'id' => $model['id'], 'person_id' => $model['person_id']], ['class' => 'fad fal fa-eye']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('', ['update', 'id' => $model['id'], 'person_id' => $model['person_id']], ['class' => 'fas fa-edit']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
