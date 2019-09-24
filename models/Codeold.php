<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "codeold".
 *
 * @property integer $id
 * @property integer $qishu
 * @property string $code
 * @property string $after_three_shape
 * @property string $after_three_size
 * @property string $after_three_jiou
 * @property string $after_two_shape
 * @property string $after_two_tens_place
 * @property string $after_two_the_unit
 * @property integer $type
 * @property integer $time
 *
 * @property Analysisold[] $analysisolds
 */
class Codeold extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'codeold';
    }

    public static $urlArr = array(
        '重庆 - [老时时彩] '=>'http://cp.360.cn/ssccq/?r_a=26ruYj',
    );

    public static $codeType = array(
        'http://cp.360.cn/ssccq/?r_a=26ruYj'=>'1',
    );

    public static $shishicaiUrl = array(
        '重庆 - [老时时彩] '=>'http://www.shishicai.cn/cqssc/touzhu/',
    );

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qishu', 'code', 'after_three_shape', 'after_three_size', 'after_three_jiou', 'after_two_shape', 'after_two_tens_place', 'after_two_the_unit', 'type', 'time'], 'required'],
            [['qishu', 'type', 'time'], 'integer'],
            [['code', 'after_three_shape', 'after_three_size', 'after_three_jiou', 'after_two_shape', 'after_two_tens_place', 'after_two_the_unit'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qishu' => 'Qishu',
            'code' => 'Code',
            'after_three_shape' => 'After Three Shape',
            'after_three_size' => 'After Three Size',
            'after_three_jiou' => 'After Three Jiou',
            'after_two_shape' => 'After Two Shape',
            'after_two_tens_place' => 'After Two Tens Place',
            'after_two_the_unit' => 'After Two The Unit',
            'type' => 'Type',
            'time' => 'Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalysisolds()
    {
        return $this->hasOne(Analysisold::className(), ['code_id' => 'id']);
    }
}
