<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
$language = \Yii::$app->request->cookies->get("language");
$this->title = \Yii::$app->params['locales']["$language"][1];
?>
<div class="page_body">
	<div class="page_content">
		<div class="page_content_header" style="background: url(/<?=Html::encode($user->bgimage)?>)">
			<div class="page_content_header_ava">
				<img src="/<?=Html::encode($user->img)?>">
			</div>
		</div>
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
			<div class="newpost_pr">
				<div class="newpost_textarea">
					<?=$form->field($model, 'text')->textarea(['rows' => 10, 'placeholder' => \Yii::$app->params['locales']["$language"][27]])?>
				</div>
				<div class="newpost_bts">
					<div class="newpost_tw">
						<label for="postform-img" class="btn" id="img-label"><?=\Yii::$app->params['locales']["$language"][24]?> <a href="#"></a></label>
						<a href="#"><?=$form->field($model, 'img')->fileInput()?></a>
					</div>
					<div class="newpost_bt">
						<button><?=\Yii::$app->params['locales']["$language"][25]?></button>
					</div>
				</div>
			</div>
		<?php ActiveForm::end() ?>
		<div class="posts">
			<!--- Open posts pattern -->
			<?php require_once \Yii::$app->params['pathToPatterns'] . "/posts_view.php"; ?>
		</div>
		<div class="page_menu">
		<?php require_once \Yii::$app->params['pathToPatterns'] . "/page_menu.php"; ?>
					<div class="page_menu_newpost">
					<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
						<div class="page_menu_newpost_textarea">
							<?=$form->field($model, 'text')->textarea(['rows' => 10, 'placeholder' => \Yii::$app->params['locales']["$language"][27]])?>
						</div>
						<div class="page_menu_newpost_bts">
							<div class="page_menu_newpost_tw">
								<label for="postform-img" class="btn" id="img-label"><?=\Yii::$app->params['locales']["$language"][24]?> <a href="#"></a></label>
								<a href="#"><?=$form->field($model, 'img')->fileInput()?></a>
								
							</div>
							<div class="page_menu_newpost_bt">
								<button><?=\Yii::$app->params['locales']["$language"][25]?></button>
							</div>
						</div>
					<?php ActiveForm::end() ?>
						</div>
					</div>
				</div>
</div>
<?php
$js = <<<JS

JS;
$this->registerJs($js);
?>