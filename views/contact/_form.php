<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Contact $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
        <?= $form->field($model, 'country_code')->widget(Select2::classname(), [
            // 'data' => ArrayHelper::map($countryList, 'phone_code', function ($countryList) {
            //     return $countryList->country_name.' '.$countryList->phone_code;
            //  }),
            'data' => ArrayHelper::map($countryList, 
                function ($countryList) {
                    if(isset($countryList->idd->root)){
                        return  $countryList->idd->root . $countryList->idd->suffixes[0];
                     }
                },
                function ($countryList) {
                    if(isset($countryList->idd->root)){
                        $countryCode =  $countryList->idd->root . $countryList->idd->suffixes[0];
                        return $countryList->name->common . ' '.$countryCode ;
                     }
                    
                  }),
            'pluginOptions' => [
                'allowClear' => true 
            ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'class' => 'form-control left-border-radios0',])->label(false) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
