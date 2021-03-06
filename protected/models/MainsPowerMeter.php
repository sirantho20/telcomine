<?php

/**
 * This is the model class for table "mains_power_meter".
 *
 * The followings are the available columns in table 'mains_power_meter':
 * @property string $serial_number
 * @property string $account_number
 * @property string $meter_type
 * @property string $kwh_readings
 *
 * The followings are the available model relations:
 * @property SiteDetails[] $siteDetails
 */
class MainsPowerMeter extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mains_power_meter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serial_number, account_number, kwh_readings', 'length', 'max'=>45),
			array('meter_type', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('serial_number, account_number, meter_type, kwh_readings', 'safe', 'on'=>'search'),
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
			'siteDetails' => array(self::HAS_MANY, 'SiteDetails', 'mains_meter'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'serial_number' => 'Serial Number',
			'account_number' => 'Account Number',
			'meter_type' => 'Meter Type',
			'kwh_readings' => 'Kwh Readings',
		);
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

		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('account_number',$this->account_number,true);
		$criteria->compare('meter_type',$this->meter_type,true);
		$criteria->compare('kwh_readings',$this->kwh_readings,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MainsPowerMeter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
