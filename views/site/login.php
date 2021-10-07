<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
  

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="jumbotron text-center bg-transparent">
        <h6 class="display-6">
        <p> Пользователь:  admin</p>    
         <p>Пароль: admin</p> 
        </h6><br><br><br>
        <h6 class="display-6">
        <p> Пользователь:  вася</p>    
         <p>Пароль: вася</p> 
        </h6><br><br><br>
        <h6 class="display-6">
        <p> Пользователь:  миша</p>    
         <p>Пароль: миша</p> 
        </h6><br><br><br>
        <h6 class="display-6">
        <p> Пользователь:  петя</p>    
         <p>Пароль: петя</p> 
        </h6><br><br><br>
    </div>
    
    

</div>
