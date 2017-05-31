<?php

namespace backend\controllers;
use Yii;
use backend\models\Goods;
use backend\models\Order;
use backend\models\GoodsSearch;
use backend\models\OrderSearch;

class CenterController extends \backend\controllers\CommonController
{
    /**
     * 个人中心首页，显示个人的基本信息
     * 在个人信息首页可以对个人信息进行修改
     */
    public function actionIndex()
    {
        /** 获取当前登录的用户信息 */
        $user = $this->findUserModel(Yii::$app->user->identity->id);

        return $this->render('index', [
            'model' => $user,
        ]);
    }
    /**
     * 在修改个人信息时，保存修改后的信息
     * @param  $id 用户的主键ID
     */
    public function actionUpdateInfo($id)
    {
        //根据url传递的id参数获取用户的信息
        $model = $this->findUserModel($id);
        //如果是post请求 则进行保存操作
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //提示用户修改成功
            Yii::$app->getSession()->setFlash('success','修改成功');
            $this->refresh();
            return true;
        //非POST请求 则显示修改个人信息页面
        } else {
            return $this->render('update-info', [
                'model' => $model,
            ]);
        }
    }
    public function actionRealName($id)
    {
        //根据url传递的id参数获取用户的信息
        $model = $this->findUserModel($id);
        //如果是post请求 则进行保存操作
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //提示用户实名认证成功
            Yii::$app->getSession()->setFlash('success','认证成功');
            $this->refresh();
            return true;
        //非POST请求 则显示修改个人信息页面
        } else {
            return $this->render('real-name', [
                'model' => $model,
            ]);
        }
    }
    /** 获取用户信息 */
    protected function findUserModel($id)
    {
        if (($model = \common\models\User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * 个人中心-发布新的闲置商品
     */
    public function actionPublishGoods()
    {
    	$model = new Goods();
    	//获取系统中当前存在的所有的商品分类
        $model = $this->initClassify($model);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['goods-detail', 'id' => $model->id]);
        } else {
            //判断用户是否进行了实名认证
            $isNamed = $this->isNamed();

            return $this->render('publish', [
                'model' => $model,
                'isNamed' => $isNamed
            ]);
        }
    }
    private function isNamed()
    {
        $user = $this->findUserModel(Yii::$app->user->identity->id);
        $idCard = $user->idCard;
        $name   = $user->name;
        $role   = $user->role;

        if(!$idCard || !$name || ($role !== '2')){
            return false;
        }else{
            return true;
        }
    }
    ///////////////////////////////////
    //      个人中心 我的商品相关       //
    ///////////////////////////////////

    /**
     * 个人中心-我的订单，根据当前登录用户为买家或者卖家，获取跟
     * 当前登录用户有关的订单信息列表
     */
    public function actionMyOrders()
    {
        //订单搜索模型
        $searchModel = new OrderSearch();
        //根据url参数创建不同的条件查询订单信息
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //全部订单信息中查询，添加查询条件
        $role = Yii::$app->user->identity->role;
        $userId = Yii::$app->user->identity->id;
        //根据登录用户角色获取设定不同的查询条件
        if($role == "1"){
            $map = ['buyerId' => $userId];
        }else{
            $map = ['sellerId' => $userId];
        }
        $dataProvider->query->andWhere($map);
        
        return $this->render('my-orders', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * 订单详情
     * @param  $id 订单的id
     */
    public function actionOrderDetail($id)
    {
        return $this->render('order-detail',[
            'model' => $this->findOrderModel($id),
        ]);
    }
    public function actionOrderStatus($id,$status)
    {
        $model = new \backend\models\Order;
        $res = $model->changeStatus($id,$status);
        if($res){
            return $this->redirect(Yii::$app->request->referrer);            
        }
    }
    /**
     * 个人中心-我发布的商品列表
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
    /**
     * 个人中心-我发布的商品详细页
     */
    public function actionGoodsDetail($id)
    {
        return $this->render('my-goods-view', [
            'model' => $this->findGoodsModel($id),
        ]);
    }
    /**
     * 修改已经发布的商品信息
     * @param  $id 商品id
     */
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
     * 个人中心-我的消息列表
     */
    public function actionMyNews()
    {
        $model = new \backend\models\OnlineConsulting;
        $data  = $model->getMyNews();

        return $this->render('my-news',[
            'model' => $model,
            'data'  => $data,
        ]);
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
    protected function findOrderModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /**
     * 在执行以上所有方法之前都要执行的方法
     */
    public function beforeAction($action)
    {
        //执行父类的beforeAction
        parent::beforeAction($action);
        //设定个人中心的布局文件
        $this->layout = 'center';
        //如果用户没有登录，则跳转到登录页面
        if(!Yii::$app->user->identity->id){
            return $this->redirect(['site/login']);
        }else{
            return true;
        }
    }
}
