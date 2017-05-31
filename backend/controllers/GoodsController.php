<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Goods;
use backend\models\GoodsSearch;
use backend\controllers\CommonController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends CommonController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 商品列表页
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $searchModel = $this->initClassify($searchModel);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $allData = $dataProvider->query->asArray()->all();
        //推广商品id
        $map = ['id'=>['1','2']];
        $recommend = $dataProvider->query->where($map)->asArray()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'allData' => $allData,
            'recommend' => $recommend
        ]);
    }

    /**
     * 商品详细页
     */
    public function actionView($id)
    {
        //根据商品id获取商品信息
        $model = $this->findModel($id);
        //添加浏览量信息
        $model->addVisitNum($model);
        //获取商品的评价信息
        $comment = $model->getComment($id);
        //获取卖家的在线状态
        $sellerStatus = $this->getSellerStatus($model->publisherId);
        //order model
        $orderModel = new \backend\models\Order();
        //保存用户提交的订单购买
        if($orderModel->load(Yii::$app->request->post()) && $orderModel->save()){
            return $this->redirect(['center/index']);
        }
        return $this->render('view', [
            'model' => $model,
            'id' => $id,
            'comment' => $comment,
            'sellerOnline' => $sellerStatus,
            'orderModel' => $orderModel,
        ]);
    }
    /** 获取卖家的状态 */
    protected function getSellerStatus($id)
    {
        $model = new \backend\models\UserStatus();
        $data  = $model->find()->where(['userId'=>$id])->asArray()->one();
        if(!empty($data) && $data['status'] == 1){
            return true;
        }else{
            return false;
        }
    }
    /** 发送消息 */
    public function actionSendMsg()
    {
        if(Yii::$app->request->isPost){
            $data = Yii::$app->request->post();

            $map = ['goodsId' => $data['goodsId'], 'sellerId'=>$data['sellerId'],'buyerId'=>$data['buyerId']];
            $msg = \backend\models\OnlineConsulting::getModel($map);
            //如果存在当前买家与卖家的会话，则直接向当前会话中添加内容
            if($msg->id){
                $msg->addContent($msg->id,$data['message'],$data['type']);
            }else{
                //否则创建会话并保存内容
                $msg->createConversion($data);
            }
            $this->ajaxJson("0","发送成功");
        }
    }
    /**
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Goods();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Goods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            $model = $this->initClassify($model);
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
