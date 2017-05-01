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

		$headers = "From: rektorat@unida.gontor.ac.id"; 
		 
		
		$semi_rand = md5(time()); 
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
		
		$headers .= "\nMIME-Version: 1.0\n" . 
		"Content-Type: multipart/mixed;\n" . 
		" boundary=\"{$mime_boundary}\""; 


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
					Terima kasih telah mendaftar
					Nama Peserta: '.$model->nama_peserta.'
					Tempat Lahir : '.$model->tempat_lahir.'
					Tanggal Lahir : '.$model->tanggal_lahir.'
					Jenis Kelamin : '.$model->jenis_kelamin.'
					Pilihan Pertama : '.$model->pilihan_pertama.'
					Pilihan Kedua : '.$model->pilihan_kedua.'
					Pilihan Ketiga : '.$model->pilihan_ketiga.'
					Alamat Lengkap : '.$model->alamat_lengkap.'
					Desa/Kelurahan : '.$model->desa.'
					Kecamatan : '.$model->nama_peserta.'
					Kabupaten/Kota : '.$model->kecamatan.'
					Propinsi : '.$model->kabupaten.'
					Kodepos : '.$model->propinsi.'
					No. Telp : '.$model->telp.'
					No. Handphone : '.$model->hp.'
					Email : '.$model->email.'
					Pesantren : '.$model->pesantren.'
					Nama Pesantren : '.$model->nama_pesantren.'
					Tahun Lulus : '.$model->tahun_lulus.'
					Lama Pendidikan : '.$model->lama_pendidikan.'
					Takhassus : '.$model->takhassus.'
					SD/MI : '.$model->sd.'
					SMP/TSANAWIYAH : '.$model->smp.'
					SMA/SMK/MA : '.$model->sma.'
					Nama Ayah : '.$model->nama_ayah.'
					Pendidikan Terakhir : '.$model->pendidikan_ayah.'
					Pekerjaan : '.$model->pekerjaan_ayah.'
					Penghasilan Per Bulan : '.$model->penghasilan_ayah.'
					Nama Ibu : '.$model->nama_ibu.'
					Pendidikan Terkahir : '.$model->pendidikan_ibu.'
					Pekerjaan : '.$model->pekerjaan_ibu.'
					Penghasilan Per Bulan : '.$model->penghasilan_ibu.'
					Pelatihan yang pernah diikuti : '.$model->pelatihan.'
					Skill/Keterampilan/Bakat yang dimiliki : '.$model->skill.'
					Apakah Anda Alumni Gontor? : '.$model->is_alumni.'
					Di kampus mana Anda akan mengikuti perkuliahan? : '.$model->kampus_tujuan.'
					Rencana Studi di UNIDA : '.$model->rencana_studi.'
					Waktu Daftar : '.$model->created.'

				';

				$mailto = $model->email;

				$emails = Yii::app()->params->emails;

				foreach($emails as $q => $v)
				{
					$this->sendmail($v, CHtml::decode(CHtml::decode(CHtml::decode($body))));					
				}



				$this->sendmail($mailto, CHtml::decode(CHtml::decode(CHtml::decode($body))));
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
