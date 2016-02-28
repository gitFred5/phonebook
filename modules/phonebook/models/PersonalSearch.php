<?php

namespace app\modules\phonebook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\phonebook\models\Personal;

/**
 * PersonalSearch represents the model behind the search form about `app\modules\phonebook\models\Personal`.
 */
class PersonalSearch extends Personal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'office_id'], 'integer'],
            [['date_registered', 'fio'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Personal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_registered' => $this->date_registered,
            'office_id' => $this->office_id,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio]);

        return $dataProvider;
    }
}
