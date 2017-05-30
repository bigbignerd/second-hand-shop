<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'rules' => [
            //         [
            //             'actions' => ['login', 'error'],
            //             'allow' => true,
            //         ],
            //         [
            //             'actions' => ['logout', 'index'],
            //             'allow' => true,
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * 网站首页
     */
    public function actionIndex()
    {
        /** @var  分类信息 */
        $classify    = $this->hotClassify();
        /** @var  最新商品信息 */
        $latestGoods = $this->latestGoods();

        return $this->render('index', [
            'hotClassify' => $classify,
            'latestGoods' => $latestGoods,
        ]);
    }
    /**
     * 热门分类数据
     * @author bignerd
     * @since  2017-04-11T14:07:43+0800
     */
    protected function hotClassify()
    {
        $selectId = ['1','2','3','4','5','11','29','8'];
        $model = new \backend\models\Classify();
        $data  = $model->find()->select(['id','name'])
                       ->where(['id'=>$selectId])
                       ->asArray()
                       ->all();
        $iconMap = [
            '1' => 'fa fa-laptop',
            '2' => 'fa fa-mobile',
            '3' => 'fa fa-camera',
            '4' => 'glyphicon glyphicon-time',
            '5' => 'fa fa-gamepad',
            '11'=> 'fa fa-desktop',
            '8' => 'fa fa-code-fork',
            '29' => 'fa fa-music'
        ];
        /** @var  图标背景色 */
        $color = ['1'=>'#3fb7d2','2' =>'#15c01c', '3' =>'#7e3b07','4' => '#1963ce','5' =>'#070c1f','11'=>'#7fbad8','8' =>'#df8012','29' =>'#f49ecf'];

        foreach ($data as $k => $v) {
            $data[$k]['icon']  = $iconMap[$v['id']];
            $data[$k]['color'] = $color[$v['id']];
        }
        return $data;
    }
    /** 数据库中获取最新数据 */
    public function latestGoods()
    {
        $model = new \backend\models\Goods();
        $data  = $model->find()->orderBy('created_at asc')->limit(6)
                       ->asArray()
                       ->all();
        foreach ($data as $k => $v) {
            $image = $v['images'];
            $imageArray = explode(",", $image);
            $data[$k]['images'] = Yii::getAlias("@upload").'/'.$imageArray[0];
        }
        return $data;
    }
    /**
     * 用户登录
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //如果登录成功，添加用户的在线状态
            $userStatus = new \backend\models\UserStatus();
            $userStatus->changeStatus(1,Yii::$app->user->identity->id);
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 退出登录
     */
    public function actionLogout()
    {
        $userId = Yii::$app->user->identity->id;
        
        Yii::$app->user->logout();
        //修改用户的状态为离线
        $model = new \backend\models\UserStatus();
        $model->changeStatus(0, $userId);

        return $this->goHome();
    }
    /**
     * 用户注册
     * @author bignerd
     * @since  2017-03-29T14:52:27+0800
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
