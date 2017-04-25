<?php

class PmbController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			
		);
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','captcha','index','import','preview','print'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionPrint($id,$token)
	{
		$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 
                        'P', 'mm', 'A4', true, 'UTF-8');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->AddPage();
		$pdf->SetAutoPageBreak(TRUE, 0);

		$this->layout = '';
		
		//echo $this->renderPartial(“createnewpdf“,array(‘content’=>$content));
		
		$attr = array(
			'token'=>$token,
			'id_pmb'=>$id
		);

		$model = Pmb::model()->findByAttributes($attr);
		

		if(!empty($model))
		{
			ob_start();
			echo $this->renderPartial('print',array(
				'model'=>$model
			));

			$data = ob_get_clean();
			ob_start();
			$pdf->writeHTML($data);

			$pdf->Output();
		}

		else{
			throw new Exception('Object not found');
			$this->redirect(array('site/error'));
		}
		
	}

	private function sendmail($mailto, $body)
	{
		$headers="From: rektorat@unida.gontor.ac.id\r\nReply-To: ".$mailto;
		mail($mailto, "Pendaftaran - UNIDA Gontor", $body,$headers);
	}

	private function actionImport()
	{
		$row = 1;
		if (($handle = fopen($_SERVER['DOCUMENT_ROOT'].'/'.Yii::app()->baseUrl."/datapmb.csv", "r")) !== FALSE) {
		  while (($hsl = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    $num = count($hsl);

		    $data = $hsl;
		    for ($c=0; $c < $num; $c++) {
		       if(empty($data[$c]))
		       	   $data[$c] = '-';
		    }


		    $pmb = new Pmb;
	    	$pmb->nama_peserta 			= $data[0];
			$pmb->tempat_lahir 			= $data[1];
			$pmb->tanggal_lahir 		= $data[2];
			$pmb->jenis_kelamin= $data[3];
			$pmb->pilihan_pertama= $data[4];
			$pmb->pilihan_kedua= $data[5];
			$pmb->pilihan_ketiga= $data[6];
			$pmb->alamat_lengkap= $data[7];
			$pmb->desa= $data[8];
			$pmb->kecamatan= $data[9];
			$pmb->kabupaten= $data[10];
			$pmb->propinsi= $data[11];
			$pmb->kodepos= $data[12];
			$pmb->telp= $data[13];
			$pmb->hp= $data[14];
			$pmb->email= $data[15];
			$pmb->pesantren= $data[16];
			$pmb->nama_pesantren= $data[17];
			$pmb->tahun_lulus= $data[18];
			$pmb->lama_pendidikan= $data[19];
			$pmb->takhassus= $data[20];
			$pmb->sd= $data[21];
			$pmb->smp= $data[22];
			$pmb->sma= $data[23];
			$pmb->nama_ayah= $data[24];
			$pmb->pendidikan_ayah= $data[25];
			$pmb->pekerjaan_ayah= $data[26];
			$pmb->penghasilan_ayah= $data[27];
			$pmb->nama_ibu= $data[28];
			$pmb->pendidikan_ibu= $data[29];
			$pmb->pekerjaan_ibu= $data[30];
			$pmb->penghasilan_ibu= $data[31];
			$pmb->pelatihan= $data[32];
			$pmb->skill= $data[33];
			$pmb->is_alumni= $data[34];
			$pmb->kampus_tujuan= $data[35];
			$pmb->rencana_studi= $data[36];
			$pmb->created = $data[37];

	        if($pmb->validate())
	        {
	        	$pmb->save();
	        }

	        else{
	        	print_r($pmb->getErrors()); 
	        }
		    // echo "<p>$num fields in line $row: <br /></p>\n";
		    $row++;
		    // for ($c=0; $c < $num; $c++) {
		    //     echo $data[$c] . "<br />\n";
		    // }
		  }
		  fclose($handle);
		}
	}

	public function actionPreview($id,$token)
	{

		$attr = array(
			'token'=>$token,
			'id_pmb'=>$id
		);

		$model = Pmb::model()->findByAttributes($attr);

		if(!empty($model))
		{
			$this->render('preview',array(
				'model'=>$model,
			));
		}

		else{
			throw new Exception('Object not found');
			$this->redirect(array('site/error'));
		}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pmb;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		

		if(isset($_POST['Pmb']))
		{
			$model->attributes=$_POST['Pmb'];
			$token = md5(uniqid(rand(), true));
			$model->token = $token;

			if($model->save())
			{

				$body = '

<div class="flash-success">
	Terima kasih telah mendaftar</div>

</h1>

<table class="detail-view" id="yw0"><tr class="odd"><th>Nama Peserta</th><td>'.$model->nama_peserta.'</td></tr>
<tr class="even"><th>Tempat Lahir</th><td>'.$model->tempat_lahir.'</td></tr>
<tr class="odd"><th>Tanggal Lahir</th><td>'.$model->tanggal_lahir.'</td></tr>
<tr class="even"><th>Jenis Kelamin</th><td>'.$model->jenis_kelamin.'</td></tr>
<tr class="odd"><th>Pilihan Pertama</th><td>'.$model->pilihan_pertama.'</td></tr>
<tr class="even"><th>Pilihan Kedua</th><td>'.$model->pilihan_kedua.'</td></tr>
<tr class="odd"><th>Pilihan Ketiga</th><td>'.$model->pilihan_ketiga.'</td></tr>
<tr class="even"><th>Alamat Lengkap</th><td>'.$model->alamat_lengkap.'</td></tr>
<tr class="odd"><th>Desa/Kelurahan</th><td>'.$model->desa.'</td></tr>
<tr class="even"><th>Kecamatan</th><td>'.$model->nama_peserta.'</td></tr>
<tr class="odd"><th>Kabupaten/Kota</th><td>'.$model->kecamatan.'</td></tr>
<tr class="even"><th>Propinsi</th><td>'.$model->kabupaten.'</td></tr>
<tr class="odd"><th>Kodepos</th><td>'.$model->propinsi.'</td></tr>
<tr class="even"><th>No. Telp</th><td>'.$model->telp.'</td></tr>
<tr class="odd"><th>No. Handphone</th><td>'.$model->hp.'</td></tr>
<tr class="even"><th>Email</th><td>'.$model->email.'</td></tr>
<tr class="odd"><th>Pesantren</th><td>'.$model->pesantren.'</td></tr>
<tr class="even"><th>Nama Pesantren</th><td>'.$model->nama_pesantren.'</td></tr>
<tr class="odd"><th>Tahun Lulus</th><td>'.$model->tahun_lulus.'</td></tr>
<tr class="even"><th>Lama Pendidikan</th><td>'.$model->lama_pendidikan.'</td></tr>
<tr class="odd"><th>Takhassus</th><td>'.$model->takhassus.'</td></tr>
<tr class="even"><th>SD/MI</th><td>'.$model->sd.'</td></tr>
<tr class="odd"><th>SMP/TSANAWIYAH</th><td>'.$model->smp.'</td></tr>
<tr class="even"><th>SMA/SMK/MA</th><td>'.$model->sma.'</td></tr>
<tr class="odd"><th>Nama Ayah</th><td>'.$model->nama_ayah.'</td></tr>
<tr class="even"><th>Pendidikan Terakhir</th><td>'.$model->pendidikan_ayah.'</td></tr>
<tr class="odd"><th>Pekerjaan</th><td>'.$model->pekerjaan_ayah.'</td></tr>
<tr class="even"><th>Penghasilan Per Bulan</th><td>'.$model->penghasilan_ayah.'</td></tr>
<tr class="odd"><th>Nama Ibu</th><td>'.$model->nama_ibu.'</td></tr>
<tr class="even"><th>Pendidikan Terkahir</th><td>'.$model->pendidikan_ibu.'</td></tr>
<tr class="odd"><th>Pekerjaan</th><td>'.$model->pekerjaan_ibu.'</td></tr>
<tr class="even"><th>Penghasilan Per Bulan</th><td>'.$model->penghasilan_ibu.'</td></tr>
<tr class="odd"><th>Pelatihan yang pernah diikuti</th><td>'.$model->pelatihan.'</td></tr>
<tr class="even"><th>Skill/Keterampilan/Bakat yang dimiliki</th><td>'.$model->skill.'</td></tr>
<tr class="odd"><th>Apakah Anda Alumni Gontor?</th><td>'.$model->is_alumni.'</td></tr>
<tr class="even"><th>Di kampus mana Anda akan mengikuti perkuliahan?</th><td>'.$model->kampus_tujuan.'</td></tr>
<tr class="odd"><th>Rencana Studi di UNIDA</th><td>'.$model->rencana_studi.'</td></tr>
<tr class="even"><th>Waktu Daftar</th><td>'.$model->created.'</td></tr>
</table>
				';

				$mailto = $model->email;

				$this->sendmail($mailto, CHtml::decode(CHtml::decode($body)));
				Yii::app()->user->setFlash('contact','Terima kasih telah mendaftar');
				$this->redirect(array('preview','id'=>$model->id_pmb,'token'=>$model->token));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pmb']))
		{
			$model->attributes=$_POST['Pmb'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_pmb));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	// /**
	//  * Lists all models.
	//  */
	public function actionIndex()
	{
		
		$this->render('index');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pmb('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pmb']))
			$model->attributes=$_GET['Pmb'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pmb the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pmb::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pmb $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pmb-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
