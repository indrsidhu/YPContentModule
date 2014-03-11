<?php
/**
 * YPContentModule
 *
 * @author YiiPlugins.com
 * @link http://yiiplugins.com/plugin/content-module
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
/**
 * This is the model class for table "yp_content".
 *
 * The followings are the available columns in table 'yp_content':
 * @property string $id
 * @property string $lang
 * @property string $content_title
 * @property string $slug
 * @property string $content_description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $is_active
 * @property string $content_group
 * @property string $created
 * @property string $updated
 */
class YPContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yp_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content_title, slug', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('lang', 'length', 'max'=>16),
			array('content_title, slug, content_group', 'length', 'max'=>45),
			array('meta_title, meta_description, meta_keywords', 'length', 'max'=>255),
			array('content_description, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lang, content_title, slug, content_description, meta_title, meta_description, meta_keywords, is_active, content_group, created, updated', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lang' => 'Locale',
			'content_title' => 'Content Title',
			'slug' => 'Slug',
			'content_description' => 'Content Description',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'is_active' => 'Is Active',
			'content_group' => 'Content Group',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('content_title',$this->content_title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('content_description',$this->content_description,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('content_group',$this->content_group,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	function getLocale(){
		$langs = array();
		$langs = array(
		'en_us'	=> 'English',
		'fr'	=>	'French',
		);
		return $langs;
	}
	
}