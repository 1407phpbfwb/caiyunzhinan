<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "nav".
 *
 * @property integer $n_id
 * @property string $n_title
 * @property string $e_title
 * @property string $n_url
 * @property string $n_img
 * @property string $n_content
 * @property string $n_desc
 */
class Nav extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $n_title;
	public $e_title;
	public $n_url;
	public $imageFile;
	public $n_content;
	public $n_desc;
	
    public static function tableName()
    {
        return 'nav';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['n_title', 'e_title', 'n_url', 'n_content', 'n_desc'], 'required','message'=>'{attribute}不能为空']
        ];
    }
	/**
	 * 文件上传 
	 */
    public function upload()
    {
    	
    	return	$this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
    	
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'n_id' => 'N ID',
            'n_title' => '中文导航：',
            'e_title' => '英文导航：',
            'n_url' => 'URL地址：',
            'imageFile' => '图片：',
            'n_content' => '标题：',
            'n_desc' => '简介：',
        ];
    }
}
