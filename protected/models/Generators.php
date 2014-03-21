<?php

/**
 * This is the model class for table "generators".
 *
 * The followings are the available columns in table 'generators':
 * @property string $generator_id
 * @property string $serial_number
 * @property string $model_number
 * @property string $manufacturer_name
 * @property string $manufacture_date
 * @property string $supplier_name
 * @property string $date_of_purchase
 * @property string $date_of_first_use
 * @property integer $kva_capacity
 * @property double $current_run_hours
 * @property string $last_serviced_date
 * @property string $engine_make
 * @property string $engine_model
 * @property double $fuel_tank_capacity
 *
 * The followings are the available model relations:
 * @property SiteDetails[] $siteDetails
 */
class Generators extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'generators';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kva_capacity', 'numerical', 'integerOnly'=>true),
			array('current_run_hours, fuel_tank_capacity', 'numerical'),
			array('generator_id, serial_number, model_number, manufacturer_name, supplier_name, engine_make, engine_model', 'length', 'max'=>45),
			array('manufacture_date, date_of_purchase, date_of_first_use, last_serviced_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('generator_id, serial_number, model_number, manufacturer_name, manufacture_date, supplier_name, date_of_purchase, date_of_first_use, kva_capacity, current_run_hours, last_serviced_date, engine_make, engine_model, fuel_tank_capacity', 'safe', 'on'=>'search'),
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
			'siteDetails' => array(self::HAS_MANY, 'SiteDetails', 'generator'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'generator_id' => 'Generator ID',
			'serial_number' => 'Serial Number',
			'model_number' => 'Model Number',
			'manufacturer_name' => 'Manufacturer Name',
			'manufacture_date' => 'Manufacture Date',
			'supplier_name' => 'Supplier Name',
			'date_of_purchase' => 'Date Of Purchase',
			'date_of_first_use' => 'Date Of First Use',
			'kva_capacity' => 'Kva Capacity',
			'current_run_hours' => 'Current Run Hours',
			'last_serviced_date' => 'Last Serviced Date',
			'engine_make' => 'Engine Make',
			'engine_model' => 'Engine Model',
			'fuel_tank_capacity' => 'Fuel Tank Capacity',
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

		$criteria->compare('generator_id',$this->generator_id,true);
		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('model_number',$this->model_number,true);
		$criteria->compare('manufacturer_name',$this->manufacturer_name,true);
		$criteria->compare('manufacture_date',$this->manufacture_date,true);
		$criteria->compare('supplier_name',$this->supplier_name,true);
		$criteria->compare('date_of_purchase',$this->date_of_purchase,true);
		$criteria->compare('date_of_first_use',$this->date_of_first_use,true);
		$criteria->compare('kva_capacity',$this->kva_capacity);
		$criteria->compare('current_run_hours',$this->current_run_hours);
		$criteria->compare('last_serviced_date',$this->last_serviced_date,true);
		$criteria->compare('engine_make',$this->engine_make,true);
		$criteria->compare('engine_model',$this->engine_model,true);
		$criteria->compare('fuel_tank_capacity',$this->fuel_tank_capacity);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Generators the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
