<?php

/**
 * This is the model class for table "site_details".
 *
 * The followings are the available columns in table 'site_details':
 * @property string $site_id
 * @property string $client_site_id
 * @property string $site_name
 * @property string $region
 * @property string $city
 * @property string $latitude
 * @property string $longitude
 * @property string $site_class
 * @property string $category1
 * @property string $category2
 * @property integer $maintenance_contractor
 * @property string $mains_meter
 * @property string $generator
 *
 * The followings are the available model relations:
 * @property FuelDelivery[] $fuelDeliveries
 * @property PmChecklist[] $pmChecklists
 * @property SubContractors $maintenanceContractor
 * @property MainsPowerMeter $mainsMeter
 * @property Generators $generator0
 */
class SiteDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'site_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maintenance_contractor', 'numerical', 'integerOnly'=>true),
			array('site_id, client_site_id, site_name, region, city, latitude, longitude, site_class, category1, category2, mains_meter, generator', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('site_id, client_site_id, site_name, region, city, latitude, longitude, site_class, category1, category2, maintenance_contractor, mains_meter, generator', 'safe', 'on'=>'search'),
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
			'fuelDeliveries' => array(self::HAS_MANY, 'FuelDelivery', 'site_id'),
			'pmChecklists' => array(self::HAS_MANY, 'PmChecklist', 'site_id'),
			'maintenanceContractor' => array(self::BELONGS_TO, 'SubContractors', 'maintenance_contractor'),
			'mainsMeter' => array(self::BELONGS_TO, 'MainsPowerMeter', 'mains_meter'),
			'generator0' => array(self::BELONGS_TO, 'Generators', 'generator'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'site_id' => 'Site',
			'client_site_id' => 'Client Site',
			'site_name' => 'Site Name',
			'region' => 'Region',
			'city' => 'City',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'site_class' => 'Site Class',
			'category1' => 'Category1',
			'category2' => 'Category2',
			'maintenance_contractor' => 'Maintenance Contractor',
			'mains_meter' => 'Mains Meter',
			'generator' => 'Generator',
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

		$criteria->compare('site_id',$this->site_id,true);
		$criteria->compare('client_site_id',$this->client_site_id,true);
		$criteria->compare('site_name',$this->site_name,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('site_class',$this->site_class,true);
		$criteria->compare('category1',$this->category1,true);
		$criteria->compare('category2',$this->category2,true);
		$criteria->compare('maintenance_contractor',$this->maintenance_contractor);
		$criteria->compare('mains_meter',$this->mains_meter,true);
		$criteria->compare('generator',$this->generator,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SiteDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
