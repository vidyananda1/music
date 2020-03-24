<?php

namespace frontend\controllers;

use Yii;
use app\models\Voter;
use app\models\VoterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use app\models\Upload;
use app\models\PollingBooth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use common\models\User;
use yii\data\ArrayDataProvider;





/**
 * VoterController implements the CRUD actions for Voter model.
 */
class VoterController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Voter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VoterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAssign()
    {

        if($selection=(array)Yii::$app->request->post('selection'))
        {
            if(Yii::$app->request->post()) {
                $list= Voter::find()->asArray()->select('id,name,house_no')->where(['id'=>$selection])->all();
                //echo "<pre>";print_r($list);die;
                if($_POST['submit'] == 'voterassign') {
                    return $this->redirect(['voter-assign/create','list' => json_encode($list)]);
                }
                else{
                     return $this->redirect(['voter/create']);
                }
                
            }
            
        }
        else
        {

            Yii::$app->session->setFlash('danger', "Your have not selected any row");
            return $this->redirect(['voter/index']);
        }

       
    }

    /**
     * Displays a single Voter model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Voter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Voter();

        if ($model->load(Yii::$app->request->post())) {
            $model->name= strtoupper($model->name);
            $model->address= strtoupper($model->address);
            $model->interest= strtoupper($model->interest);
            $model->created_by = 1;//Yii::$app->user->id;
            if(!$model->save()){
                Yii::$app->session->setFlash('danger', 'Failed to save!');
                return $this->redirect(Yii::$app->request->referrer);
            }else{
                Yii::$app->session->setFlash('success', 'Successfully saved!');
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Voter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    public function actionVoterupload()
    {
      $modelUpload = new Upload();
      //$course = ArrayHelper::map(Courses::find()->all(), 'course_id', 'course');
      if($modelUpload->load(Yii::$app->request->post())) {
          //New Employee UploadedFile///////////////////////////////////////////////////////////////
              if(!$modelUpload->file = UploadedFile::getInstance($modelUpload, 'file')) {
                Yii::$app->session->setFlash('danger', 'Error while uploading file');
                return $this->redirect(Yii::$app->request->referrer);
              }
              $modelUpload->file=UploadedFile::getInstance($modelUpload, 'file');
              $modelUpload->file->saveAs('uploads/' . $modelUpload->file->baseName . '.' . $modelUpload->file->extension);
              // echo $model->file->type;die;
              $inputFile = 'uploads/'.$modelUpload->file->name;
             
              try{
                $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFile);
              }catch(Exception $e){
                echo $e;
                die;
              }

              $sheet = $objPHPExcel->getSheet(0);
              $highestRow = $sheet->getHighestRow();
              $highestColumn = $sheet->getHighestColumn();
              $col_arr = array();
              $rowdata = $sheet->rangeToArray('A1'.':'.$highestColumn.'1',NULL,TRUE,FALSE);
              $row = $rowdata[0];
              foreach($row as $r)
              {
                if(empty($r))
                break;
                $col_arr[]=$r;
              }
                $polling = ArrayHelper::map(PollingBooth::find()->asArray()->all(),'name','id');

              //getting data and transform into collection
              $x = "A";
              $x = ord($x)+count($col_arr) - 1;
              $highestColumn = chr($x);
              $flag = 1;
              $vot = 0;
              $transaction = Yii::$app->db->beginTransaction();
              try{
                  for($row = 2;$row <= $highestRow;$row++)
                  {
                    $rowdata = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
                    $d = $rowdata[0];

                      $exists = Voter::find()->where(['voter_id'=>$d[1]])->andWhere(['record_status'=>'1'])->one();
                      if($exists)
                      {
                        continue;
                      }
                        $vot++;
                      //Registration insert
                     $voter = new Voter();
                     $voter->voter_id = "$d[1]";
                     $name = trim($d[2]," ");
                     $voter->name = $name;
                     $g=$d[3];
                     $poll = isset($polling[$g])? $polling[$g] :'';
                     $voter->polling_booth_id = $poll;
                     $house =  trim($d[4]," ");
                     $voter->house_no = $house;
                     $ph = trim($d[5]," ");
                     $voter->phone = $ph; 
                     $adds= trim($d[6]," ");
                     $voter->address = $adds;
                     $voter->record_status = '1';
                     $voter->createdDate = date('Y-m-d');
                     $voter->createdBy = Yii::$app->user->identity->id;

                      if(!$flag=$reg->save())
                      {
                        var_dump($reg->errors);
                        die;
                        break;
                      }
                      $flag=$reg->save();
                      
                  }

                  if($flag)
                  {
                    // echo 1; die;
                    $transaction->commit();
                    unlink($inputFile);
                    $text = "$vot Voters  Uploaded successfully.";
                      Yii::$app->session->setFlash('success',"$text");
                    return $this->redirect(Yii::$app->request->referrer);
                  }else {
                    $transaction->rollBack();
                    unlink($inputFile);
                    Yii::$app->session->setFlash('danger',"New Voters upload failed.");
                    return $this->redirect(Yii::$app->request->referrer);
                  }
                }catch(Exception $e){
                  // echo 'e';die;
                  $transaction->rollBack();
                  unlink($inputFile);
                }
      }
      return $this->renderAjax('voterupload',
        [
            'modelUpload'=>$modelUpload,
        
        ]);
    }

    /**
     * Deletes an existing Voter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Voter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Voter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Voter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
