<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\log\Logger;

use common\models\GastoApi;
use common\models\Url;
use common\models\User;
use common\models\RegistroApi;


use ruskid\csvimporter\CSVImporter;
use ruskid\csvimporter\MultipleImportStrategy;
use ruskid\csvimporter\CSVReader;
// use yii\helpers\Url;


/**
 *
 * @author Jiuly Rojas
 */
class TaskController extends Controller {

    /**
     *
     */
    public function actionFaltante(){
        $archivos=GastoApi::findBySql("select * from gasto_api")->all();
        //  print_r($archivos); exit;
        foreach ($archivos as $archivo){
            $urlhome= \common\models\Url::find()->where(['tipo'=>'subir'])->one();
            $path=$urlhome->nombre;
            // echo $path; exit;
            // Abrimos la carpeta que nos pasan como parámetro
            $dir = opendir($path);
            $a=0;
            while ($elemento = readdir($dir)){
                // Tratamos los elementos . y .. que tienen todas las carpetas
                if( $elemento != "." && $elemento != ".." && $elemento != "desktop.ini"){
                    // Si es una carpeta
                    if( is_dir($path.$elemento) ){
    
                      } else {
                        // echo "$a \n";
                        // echo $path.$archivo->IdApi.'png'; exit;
                        if (file_exists( $path.$archivo->IdApi.'.png')) {
                            //  echo $a." El fichero $elemento existe\n"; 
                        } else {
                               //traer la imagen
                                $idExpensive=$archivo->IdApi;
                                $url = "https://api-front.expensya.com/Manage/api/image/url/?imageId=$idExpensive";
                                $curl = curl_init($url);
                    
                                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                                curl_setopt($curl, CURLOPT_URL, $url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    
                                $token=User::findOne(['id'=>2])->token;
                                $registroapi=RegistroApi::findBySql("select * from registro_api limit 1")->one()->clave_primaria;
                    
                                # Request headers
                                $headers = array(
                                    "Expensya-Token: $token",
                                    'Cache-Control: no-cache',
                                    "Ocp-Apim-Subscription-Key: $registroapi");
                                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                    
                                //Se agrega porque no reconoce el certificado SSL
                                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
                    
                    
                                $resp = curl_exec($curl);
                                $var1=json_decode($resp,true);
                                curl_close($curl);
                                
                                // echo "<pre>"; print_r($var1['ResultItem']['imageUrl']);exit;
                                if (isset($var1['ResultItem']['imageUrl']))   {
                                    $url =$var1['ResultItem']['imageUrl'];
                                
                                    $img = "$path$idExpensive.png"; 
                                    
                                    // Function to write image into file
                                    file_put_contents($img, file_get_contents($url));
                                    
                                    echo $a." El fichero $idExpensive.png ha sido cargado exitosamente \n";
    
    

                                } 
                              
                            //echo "El fichero $archivo->archivo_cargado no existe \n"; break;
                        }

                        }
                      
                    }
                    $a++; 
                }
                  
            // echo $a;

        }

      
    }


}
