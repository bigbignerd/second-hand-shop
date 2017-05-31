<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `backend\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'classifyId', 'childClassifyId', 'number', 'condition', 'publisherId', 'viewNum', 'created_at', 'updated_at'], 'integer'],
            [['title', 'name', 'desc', 'images', 'city'], 'safe'],
            [['price'], 'number'],
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
        $query = Goods::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'classifyId' => $this->classifyId,
            'childClassifyId' => $this->childClassifyId,
            'price' => $this->price,
            'number' => $this->number,
            'condition' => $this->condition,
            'publisherId' => $this->publisherId,
            'viewNum' => $this->viewNum,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'city', $this->city]);
        if(isset($params['sort']) && (strpos($params['sort'], "-") !== false)){
            $order = 'desc';
        }else{
            $order = 'asc';
        }
        $query->orderBy('price '.$order);
        return $dataProvider;
    }
    public function searchMy($params)
    {
        $query = Goods::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        //搜索条件
        $query->where(['publisherId' => Yii::$app->user->identity->id]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'classifyId' => $this->classifyId,
            'childClassifyId' => $this->childClassifyId,
            'price' => $this->price,
            'number' => $this->number,
            'condition' => $this->condition,
            'publisherId' => $this->publisherId,
            'viewNum' => $this->viewNum,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}
