<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = "Редактирование";
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
                    <?=$form->field($model, 'text')->textarea(['rows' => 10, 'placeholder' => "Что нового?", 'value' => $post->text])?>
                </div>
                <div class="newpost_bts">
                    <div class="newpost_tw">
                        <label for="postform-img" class="btn" id="img-label">Прикрепить <a href="#"></a></label>
                        <a href="#"><?= $form->field($model, 'img')->fileInput() ?></a>
                    </div>
                    <div class="newpost_bt">
                        <button>Редактировать</button>
                    </div>
                </div>
            </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
<?php
$js = <<<JS
$("#postform-img").change(function() {
  filename = this.files[0].name
  $("#img-label a").html(filename)
  console.log(filename);
});
if (!window.Clipboard) {
   var pasteCatcher = document.createElement("div");
    
   // Firefox вставляет все изображения в элементы с contenteditable
   pasteCatcher.setAttribute("contenteditable", "");
    
   pasteCatcher.style.display = "none";
   document.body.appendChild(pasteCatcher);
 
   // элемент должен быть в фокусе
   pasteCatcher.focus();
   document.addEventListener("click", function() { pasteCatcher.focus(); });
} 
// добавляем обработчик событию
window.addEventListener("paste", pasteHandler);
 
function pasteHandler(e) {
// если поддерживается event.clipboardData (Chrome)
      if (e.clipboardData) {
      // получаем все содержимое буфера
      var items = e.clipboardData.items;
      if (items) {
         // находим изображение
         for (var i = 0; i < items.length; i++) {
            if (items[i].type.indexOf("image") !== -1) {
               // представляем изображение в виде файла
               var blob = items[i].getAsFile();
			   document.getElementById('postform-img').files = e.clipboardData.files
               // создаем временный урл объекта
               var URLObj = window.URL || window.webkitURL;
               var source = URLObj.createObjectURL(blob);                
               // добавляем картинку в DOM
               //createImage(source);
            }
         }
      }
   // для Firefox проверяем элемент с атрибутом contenteditable
   } else {      
      setTimeout(checkInput, 1);
   }
}
 
function checkInput() {
    var child = pasteCatcher.childNodes[0];   
   pasteCatcher.innerHTML = "";    
   if (child) {
// если пользователь вставил изображение – создаем изображение
      if (child.tagName === "IMG") {
         createImage(child.src);
      }
   }
}
 
function createImage(source) {
   var pastedImage = new Image();
   pastedImage.onload = function() {
	   // вставить в DOM
   }
   pastedImage.src = source;
   
}
JS;
$this->registerJs($js);
?>