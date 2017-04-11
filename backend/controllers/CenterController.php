<?php

namespace backend\controllers;
use Yii;
use backend\models\Goods;
use backend\models\GoodsSearch;

class CenterController extends \backend\controllers\CommonController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * 发布新的闲置商品
     * @author bignerd
     * @since  2017-04-11T11:31:09+0800
     * @return [type]
     */
    public function actionPublishGoods()
    {
    	$model = new Goods();
    	//get classify
        $model = $this->initClassify($model);
        /**
         * 这里需要添加发布商品前的实名认证检查
         */
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['goods-detail', 'id' => $model->id]);
        } else {
            return $this->render('publish', [
                'model' => $model,
            ]);
        }
    }
    ///////////////////////////////////
    //      个人中心 我的商品相关       //
    ///////////////////////////////////
    
    /**
     * 我发布的商品列表
     * @author bignerd
     * @since  2017-04-11T11:32:00+0800
     * @return [type]
     */
    public function actionMyGoods()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->searchMy(Yii::$app->request->queryParams);
        $searchModel = $this->initClassify($searchModel);

        return $this->render('my-goods', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionGoodsDetail($id)
    {
        return $this->render('my-goods-view', [
            'model' => $this->findGoodsModel($id),
        ]);
    }
    public function actionGoodsUpdate($id)
    {
        $model = $this->findGoodsModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('publish', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findGoodsModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            $model = $this->initClassify($model);
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
