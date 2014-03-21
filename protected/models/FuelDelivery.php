<?php

/**
 * This is the model class for table "fuel_delivery".
 *
 * The followings are the available columns in table 'fuel_delivery':
 * @property integer $id
 * @property string $site_id
 * @property string $delivery_date
 * @property string $field_engineer
 * @property string $fuel_company
 * @property double $quantity_before
 * @property double $quantity_added
 * @property double $quantity_after
 * @property string $driver_name
 * @property double $mains_meter_reading
 * @property string $comments
 * @property integer $fuel_supplier
 *
 * The followings are the available model relations:
 * @property SiteDetails $site
 * @property FuelSupplier $fuelSupplier
 */
class FuelDelivery extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fuel_delivery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fuel_supplier', 'numerical', 'integerOnly'=>true),
			array('quantity_before, quantity_added, quantity_after, mains_meter_reading', 'numerical'),
			array('site_id, field_engineer, fuel_company, driver_name', 'length', 'max'=>45),
			array('delivery_date, comments', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, site_id, delivery_date, field_engineer, fuel_company, quantity_before, quantity_added, quantity_after, driver_name, mains_meter_reading, comments, fuel_supplier', 'safe', 'on'=>'search'),
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
			'site' => array(self::BELONGS_TO, 'SiteDetails', 'site_id'),
			'fuelSupplier' => array(self::BELONGS_TO, 'FuelSupplier', 'fuel_supplier'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'site_id' => 'Site',
			'delivery_date' => 'Delivery Date',
			'field_engineer' => 'Field Engineer',
			'fuel_company' => 'Fuel Company',
			'quantity_before' => 'Quantity Before',
			'quantity_added' => 'Quantity Added',
			'quantity_after' => 'Quantity After',
			'driver_name' => 'Driver Name',
			'mains_meter_reading' => 'Mains Meter Reading',
			'comments' => 'Comments',
			'fuel_supplier' => 'Fuel Supplier',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('site_id',$this->site_id,true);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('field_engineer',$this->field_engineer,true);
		$criteria->compare('fuel_company',$this->fuel_company,true);
		$criteria->compare('quantity_before',$this->quantity_before);
		$criteria->compare('quantity_added',$this->quantity_added);
		$criteria->compare('quantity_after',$this->quantity_after);
		$criteria->compare('driver_name',$this->driver_name,true);
		$criteria->compare('mains_meter_reading',$this->mains_meter_reading);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('fuel_supplier',$this->fuel_supplier);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FuelDelivery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
