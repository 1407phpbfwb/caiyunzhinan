<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class NavForm extends Model
{
	public $n_title;
	public $e_title;
	public $n_url;
	public $imageFile;
	public $n_content;
	public $n_desc;
	public $n_img;
	public static function tableName()
	{
		return 'nav';
	}

	public function rules()
	{
		return [
		[['n_img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
		[['n_title', 'e_title', 'n_url', 'n_content', 'n_desc'], 'required','message'=>'{attribute}不能为空']
		];
	}
	/**
	 * 文件上传
	 */
	public function upload()
	{
		if ($this->validate()) {
			$this->n_img->saveAs('uploads/'.$this->n_img->baseName . '.' . $this->n_img->extension);
			return true;
		} else {
			return false;
		}
	}
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
		'n_title' => '中文导航：',
		'e_title' => '英文导航：',
		'n_url' => 'URL地址：',
		'n_img' => '图片：',
		'n_content' => '标题：',
		'n_desc' => '简介：',
		];
	}
}
