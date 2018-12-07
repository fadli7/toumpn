<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use backend\models\Chapter;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_chapter')->dropDownList(
        ArrayHelper::map(Chapter::find()->all(),'id_chapter', 'name'), 
        ['prompt'=>'Pilih Paket Soal']
    )?>

       <?= $form->field($model, 'question')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [     
            //set br for enter
            'force_br_newlines' => true,
            'force_p_newlines' => false,
            'forced_root_block' => '',

            'plugins'=> [
                    "eqneditor advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste image code imagetools"
            ],
            'toolbar' => [ 
                "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | eqneditor link image imageupload code" ],

             "selector" => '#editor',
              
             // enable title field in the Image dialog
              "image_title" => true, 
              // enable automatic uploads of images represented by blob or data URIs
              "automatic_uploads" => true,
              // add custom filepicker only to Image dialog
              "file_picker_types" => 'image',

             //set file upload
             'file_picker_callback' => new JsExpression("function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', () => {
                  var reader = new FileReader();
                  var file = input.files[0]

                  var id
                  var blobCache
                  var base64
                  var blobInfo
                  reader.onload = function (e) {
                    let formData = new FormData()
                    formData.append('imageFile', file)

                    fetch('/toumpn/backend/web/question/upload',{
                      method: 'POST',
                      body: formData
                    }).then(response=> {
                      return response.json()
                    }).then(dataImg => {
                      cb(dataImg.img, {
                        alt: ''
                      })
                    })
                    
                    // id = 'blobid' + (new Date()).getTime();
                    // blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    // base64 = reader.result.split(',')[1];
                    // blobInfo = blobCache.create(id, file, base64);
                    // blobCache.add(blobInfo);
                    // cb(blobInfo.blobUri(), { title: file.name });
                  }

                  reader.readAsDataURL(file)
                })
             
                input.click();

              }"),
        ]
  ]);?>
    <?= $form->field($model, 'status')->radioList(['Y' => 'Aktif', 'N' => 'Tidak']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
