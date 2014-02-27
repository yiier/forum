<?php

namespace app\models;

class NodeQuery extends \yii\db\ActiveQuery
{
    public function behaviors() {
        return [
            [
                'class' => \creocoder\behaviors\NestedSetQuery::className(),
            ],
        ];
    }
}