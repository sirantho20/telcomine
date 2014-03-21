<?php

/**
 * This is the model class for table "pm_checklist".
 *
 * The followings are the available columns in table 'pm_checklist':
 * @property integer $id
 * @property integer $field
 * @property string $site_id
 * @property string $check_flag
 * @property string $check_date
 * @property string $checked_by
 * @property string $check_entry_by
 * @property string $check_entry_date
 * @property string $comment
 * @property string $verified_date
 * @property string $verified_by
 *
 * The followings are the available model relations:
 * @property Users $verifiedBy
 * @property SiteDetails $site
 * @property Users $checkedBy
 */
class PmChecklist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pm_checklist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('field', 'numerical', 'integerOnly'=>true),
			array('site_id, checked_by, check_entry_by, verified_by', 'length', 'max'=>45),
			array('check_flag', 'length', 'max'=>1),
			array('check_date, check_entry_date, comment, verified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, field, site_id, check_flag, check_date, checked_by, check_entry_by, check_entry_date, comment, verified_date, verified_by', 'safe', 'on'=>'search'),
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
			'verifiedBy' => array(self::BELONGS_TO, 'Users', 'verified_by'),
			'site' => array(self::BELONGS_TO, 'SiteDetails', 'site_id'),
			'checkedBy' => array(self::BELONGS_TO, 'Users', 'checked_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'field' => 'Field',
			'site_id' => 'Site',
			'check_flag' => 'Check Flag',
			'check_date' => 'Check Date',
			'checked_by' => 'Checked By',
			'check_entry_by' => 'Check Entry By',
			'check_entry_date' => 'Check Entry Date',
			'comment' => 'Comment',
			'verified_date' => 'Verified Date',
			'verified_by' => 'Verified By',
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
		$criteria->compare('field',$this->field);
		$criteria->compare('site_id',$this->site_id,true);
		$criteria->compare('check_flag',$this->check_flag,true);
		$criteria->compare('check_date',$this->check_date,true);
		$criteria->compare('checked_by',$this->checked_by,true);
		$criteria->compare('check_entry_by',$this->check_entry_by,true);
		$criteria->compare('check_entry_date',$this->check_entry_date,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('verified_date',$this->verified_date,true);
		$criteria->compare('verified_by',$this->verified_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PmChecklist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
