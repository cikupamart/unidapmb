<?php

/**
 * This is the model class for table "t_pmb".
 *
 * The followings are the available columns in table 't_pmb':
 * @property integer $id_pmb
 * @property string $nama_peserta
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property integer $pilihan_pertama
 * @property integer $pilihan_kedua
 * @property integer $pilihan_ketiga
 * @property string $alamat_lengkap
 * @property string $desa
 * @property string $kecamatan
 * @property string $kabupaten
 * @property string $propinsi
 * @property string $kodepos
 * @property string $telp
 * @property string $hp
 * @property string $email
 * @property string $pesantren
 * @property string $nama_pesantren
 * @property string $tahun_lulus
 * @property string $lama_pendidikan
 * @property string $takhassus
 * @property string $sd
 * @property string $smp
 * @property string $sma
 * @property string $nama_ayah
 * @property string $pendidikan_ayah
 * @property string $pekerjaan_ayah
 * @property string $penghasilan_ayah
 * @property string $nama_ibu
 * @property string $pendidikan_ibu
 * @property string $pekerjaan_ibu
 * @property string $penghasilan_ibu
 * @property string $pelatihan
 * @property string $skill
 * @property string $is_alumni
 * @property string $kampus_tujuan
 * @property string $rencana_studi
 * @property string $created
 *
 * The followings are the available model relations:
 * @property MProdi $pilihanKetiga
 * @property MProdi $pilihanPertama
 * @property MProdi $pilihanKedua
 */
class Pmb extends CActiveRecord
{

	public $TANGGAL_AWAL;
	public $TANGGAL_AKHIR;

	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_pmb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('nama_peserta, tempat_lahir, tanggal_lahir, jenis_kelamin, pilihan_pertama, pilihan_kedua, pilihan_ketiga, alamat_lengkap, desa, kecamatan, kabupaten, propinsi, hp, email, pesantren, sd, smp, sma, nama_ayah, pendidikan_ayah, penghasilan_ayah,pekerjaan_ayah, nama_ibu, pendidikan_ibu, pekerjaan_ibu, pelatihan, skill, is_alumni, kampus_tujuan, rencana_studi', 'required','message'=>'{attribute} tidak boleh kosong'),
			
			array('nama_peserta, tempat_lahir, tanggal_lahir, alamat_lengkap, desa, kecamatan, kabupaten, propinsi, nama_pesantren, takhassus, nama_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah, nama_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu', 'length', 'max'=>255),
			array('jenis_kelamin, telp, hp, kampus_tujuan, rencana_studi', 'length', 'max'=>50),
			array('kodepos, pesantren, tahun_lulus, is_alumni', 'length', 'max'=>255),
			array('email, lama_pendidikan', 'length', 'max'=>100),
			array('email','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pmb, nama_peserta, tempat_lahir, tanggal_lahir, jenis_kelamin, pilihan_pertama, pilihan_kedua, pilihan_ketiga, alamat_lengkap, desa, kecamatan, kabupaten, propinsi, kodepos, telp, hp, email, pesantren, nama_pesantren, tahun_lulus, lama_pendidikan, takhassus, sd, smp, sma, nama_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah, nama_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, pelatihan, skill, is_alumni, kampus_tujuan, rencana_studi, created, token', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pilihanKetiga' => array(self::BELONGS_TO, 'MProdi', 'pilihan_ketiga'),
			'pilihanPertama' => array(self::BELONGS_TO, 'MProdi', 'pilihan_pertama'),
			'pilihanKedua' => array(self::BELONGS_TO, 'MProdi', 'pilihan_kedua'),
			'kampusTujuan' => array(self::BELONGS_TO, 'MKampus', 'kampus_tujuan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pmb' => 'Id Pmb',
			'nama_peserta' => 'Nama Peserta',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'jenis_kelamin' => 'Jenis Kelamin',
			'pilihan_pertama' => 'Pilihan Pertama',
			'pilihan_kedua' => 'Pilihan Kedua',
			'pilihan_ketiga' => 'Pilihan Ketiga',
			'alamat_lengkap' => 'Alamat Lengkap',
			'desa' => 'Desa/Kelurahan',
			'kecamatan' => 'Kecamatan',
			'kabupaten' => 'Kabupaten/Kota',
			'propinsi' => 'Propinsi',
			'kodepos' => 'Kodepos',
			'telp' => 'No. Telp',
			'hp' => 'No. Handphone',
			'email' => 'Email',
			'pesantren' => 'Pendidikan Pesantren',
			'nama_pesantren' => 'Nama Pesantren',
			'tahun_lulus' => 'Tahun Lulus',
			'lama_pendidikan' => 'Lama Pendidikan',
			'takhassus' => 'Takhassus',
			'sd' => 'SD/MI',
			'smp' => 'SMP/TSANAWIYAH',
			'sma' => 'SMA/SMK/MA',
			'nama_ayah' => 'Nama Ayah',
			'pendidikan_ayah' => 'Pendidikan Terakhir',
			'pekerjaan_ayah' => 'Pekerjaan',
			'penghasilan_ayah' => 'Penghasilan Per Bulan',
			'nama_ibu' => 'Nama Ibu',
			'pendidikan_ibu' => 'Pendidikan Terkahir',
			'pekerjaan_ibu' => 'Pekerjaan',
			'penghasilan_ibu' => 'Penghasilan Per Bulan',
			'pelatihan' => 'Pelatihan yang pernah diikuti',
			'skill' => 'Skill/Keterampilan/Bakat yang dimiliki',
			'is_alumni' => 'Apakah Anda Alumni Gontor 2017 ?',
			'kampus_tujuan' => 'Di kampus mana Anda akan mengikuti perkuliahan?',
			'rencana_studi' => 'Rencana Studi di UNIDA',
			'created' => 'Waktu Daftar',
			'verifyCode'=>'Verification Code',
			'token' => 'Token'
		);
	}

	public function searchPmb()
	{
		$criteria = new CDbCriteria; 
		$criteria->addBetweenCondition('created', $this->TANGGAL_AWAL, $this->TANGGAL_AKHIR, 'AND');

		return Pmb::model()->findAll($criteria);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_pmb',$this->id_pmb);
		$criteria->compare('nama_peserta',$this->nama_peserta,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('pilihan_pertama',$this->pilihan_pertama);
		$criteria->compare('pilihan_kedua',$this->pilihan_kedua);
		$criteria->compare('pilihan_ketiga',$this->pilihan_ketiga);
		$criteria->compare('alamat_lengkap',$this->alamat_lengkap,true);
		$criteria->compare('desa',$this->desa,true);
		$criteria->compare('kecamatan',$this->kecamatan,true);
		$criteria->compare('kabupaten',$this->kabupaten,true);
		$criteria->compare('propinsi',$this->propinsi,true);
		$criteria->compare('kodepos',$this->kodepos,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pesantren',$this->pesantren,true);
		$criteria->compare('nama_pesantren',$this->nama_pesantren,true);
		$criteria->compare('tahun_lulus',$this->tahun_lulus,true);
		$criteria->compare('lama_pendidikan',$this->lama_pendidikan,true);
		$criteria->compare('takhassus',$this->takhassus,true);
		$criteria->compare('sd',$this->sd,true);
		$criteria->compare('smp',$this->smp,true);
		$criteria->compare('sma',$this->sma,true);
		$criteria->compare('nama_ayah',$this->nama_ayah,true);
		$criteria->compare('pendidikan_ayah',$this->pendidikan_ayah,true);
		$criteria->compare('pekerjaan_ayah',$this->pekerjaan_ayah,true);
		$criteria->compare('penghasilan_ayah',$this->penghasilan_ayah,true);
		$criteria->compare('nama_ibu',$this->nama_ibu,true);
		$criteria->compare('pendidikan_ibu',$this->pendidikan_ibu,true);
		$criteria->compare('pekerjaan_ibu',$this->pekerjaan_ibu,true);
		$criteria->compare('penghasilan_ibu',$this->penghasilan_ibu,true);
		$criteria->compare('pelatihan',$this->pelatihan,true);
		$criteria->compare('skill',$this->skill,true);
		$criteria->compare('is_alumni',$this->is_alumni,true);
		$criteria->compare('kampus_tujuan',$this->kampus_tujuan,true);
		$criteria->compare('rencana_studi',$this->rencana_studi,true);
		$criteria->compare('created',$this->created,true);
		$criteria->order = 'created DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pmb the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
