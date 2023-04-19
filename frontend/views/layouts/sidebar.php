<?php
use yii\helpers\{Html, Url};

use common\models\Archivo;

$user= Yii::$app->user->id;
$base=Url::base();

?>
    <!-- sidebar-->
     

    
    <div class="site-menubar">
      <ul class="site-menu">

      <?php  if (Yii::$app->user->can('Administrador') || Yii::$app->user->can('Empresa'))  { ?>
             
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?=$base?>/empresa/index">
                    <i class="site-menu-icon md-receipt" aria-hidden="true" style="font-size: 18px;"></i>
                    <span class="site-menu-title"><?=Yii::t('app', 'Empresa')?></span>
                </a>
             </li> 
      <?php }?> 
      <?php  if (Yii::$app->user->can('Administrador'))  { ?>     
             <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?=$base?>/programa/index">
                    <i class="site-menu-icon md-account-box" aria-hidden="true" style="font-size: 18px;"></i>
                    <span class="site-menu-title"><?=Yii::t('app', 'Programa')?></span>
                </a>
             </li> 
             <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?=$base?>/etapa/index">
                    <i class="site-menu-icon md-assignment" aria-hidden="true" style="font-size: 18px;"></i>
                    <span class="site-menu-title"><?=Yii::t('app', 'Etapa')?></span>
                </a>
             </li> 
       <?php } ?>      
             <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?=$base?>/user-etapa/index">
                    <i class="site-menu-icon md-card" aria-hidden="true" style="font-size: 18px;"></i>
                    <span class="site-menu-title"><?=Yii::t('app', 'Etapa usuario')?></span>
                </a>
             </li> 

             <li class="site-menu-item  has-sub">
                <a class="animsition-link" href="<?=$base?>/user/index">
                <i class="site-menu-icon md-account" aria-hidden="true" style="font-size: 18px;"></i>
                    <span class="site-menu-title"> <?=Yii::t('app','Users')?></span>
                </a>
              </li>
            
          
          <?php  if (Yii::$app->user->can('Administrador') )  { ?>
             
          <li class="site-menu-item has-sub">
          <a href="javascript:void(0)">
                  <i class="site-menu-icon md-settings" aria-hidden="true" style="font-size: 18px;"></i>
                  <span class="site-menu-title"><?=Yii::t('app','Setting')?></span>
                          <span class="site-menu-arrow"></span>
          </a>
          <ul class="site-menu-sub">
         
          <?php  if (Yii::$app->user->can('Administrador'))  { ?>  
            <li class="site-menu-item">
              <a class="animsition-link" href="<?=$base?>/rbac/">
                <span class="site-menu-title"><i class="site-menu-icon md-accounts-alt" aria-hidden="true" style="font-size: 18px;"></i> <?=Yii::t('app','Permissions')?></span>
              </a>
            </li>
            <?php } ?>    
             
          </ul>
        </li>
        <?php } ?>
        
      </ul>
      
      </div>  
    <div class="site-menubar-footer">
              <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title="Settings">
                <span class="icon md-settings" aria-hidden="true"></span>
              </a>
              <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
                <span class="icon md-eye-off" aria-hidden="true"></span>
              </a>
              <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="<?=Yii::t('app','Log out')?>">
                <span class="icon md-power" aria-hidden="true"></span>
              </a>
            </div>
      <div>
        
        <div>
        
      </div>
   
    </div>
   
    <div class="site-menubar-footer">
    <?= Html::a('<i class="icon md-power" aria-hidden="true" style="font-size: 18px;"></i>',['/site/logout'],['data-method' => 'post','class'=>'dropdown-item']) ?>

    </div>
 
 <!-- End sidebar-->