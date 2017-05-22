<?php

namespace backend\controllers;

use Yii;
use backend\models\Goods;
use backend\models\GoodsSearch;
use backend\controllers\CommonController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocController implements the CRUD actions for Goods model.
 */
class DocController extends CommonController
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
        1.1研究背景
        当前的环境下，科技日益的进步，电子产品不但种类繁多，而且更新换代的速度飞快，甚至一年内，可能会更新两到三代，人们追求新产品的新特性，旧的设备经常是
        被遗弃在角落，并且这些所谓的“淘汰”产品并非无法继续使用。另外，一些低收入或者无收入的群体（如学生），期望以较低的价格获得这些拥有新特性的产品。或者
        另外的一类喜欢收藏各种电子类产品的爱好者，也会有着同样的需求。

        1.2研究目的及意义

        1.2.1研究目的
        针对以上的需求，来着手解决这个问题。方法就是建立一个在线的电子产品交易平台，让电子产品拥有者在本平台注册为卖家，并发布自己所拥有的
        闲置商品，然后广大的需求者可以在平台注册为用户，以搜索自己欲购买的产品，与卖家咨询，完成交易。

        1.2.2研究意义

        据统计，2015年，我国丢弃的电子垃圾总量约650万吨，在全球仅次于美国位列第二，而全球每年的电子垃圾数量高达4180万吨。我国已进入电子产品报废的高峰期，报废量年均增长20%。这些电子设备包括，各种电脑、手机、电视机、以及各种通讯设备。
        电子废弃物是属于固体废弃物，不同于城市垃圾，电子废弃物中含有氯氟碳化物，卤素阻燃剂，汞、铅、镍、铬等，直接燃烧或者填埋会造成空气、土壤、水体
        的严重污染。

        所以，建立本平台，不仅满足了不同消费人群对电子产品的需求，同时避免了资源的浪费，以及可能造成的对环境的破坏。

        1.3本文主要工作   
        概述整个课题内容，详细介绍课题产品的设计、项目开发流程、各个功能模块的实现、以及项目开发环境与工具的选择和使用。

        1.4论文的结构
        本文具体内容包括：开发技术及工具的简介、系统可行性分析、需求分析、系统概要设计、系统详细设计以及系统测试。
        论文重点为平台产品的系统详细设计部分，对每个模块的实现以及遇到的问题进行分析介绍。

        最后，对主要的功能模块进行详细的测试。使得系统带到一个稳定的状态。

     */
    /**
     *
     * @author bignerd
     * @since  2017-04-24T13:32:14+0800
     * @return [type]
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new \backend\models\Goods();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
    第二章  开发技术和使用工具

    2.1 web技术
    web技术指的是开发互联网应用的技术，主要有三种表现形式：即超文本（hypertext）、超媒体（hypermedia）、超文本传输协议（HTTP）。web是一种典型的分布式结构，大体可被划分为服务端技术与客户端技术。

    2.1.1 web客户端技术 

    web客户端的主要任务是展现信息内容——也就是我们打开web应用第一眼所看到的部分。Web客户端就是指浏览器端，是用户和服务器端程序交互的一个接口，主要任务是收集用户数据、将数据发送至服务器、接受服务器响应、解释执行server端返回的代码，以更加人性化的方式展现信息。主流的web端技术包括HTML、CSS、JavaScript。
    HTML语言。HTML是Hypertext Markup Language（ 超文本标记语言）的缩写，它是构成Web页面的主要工具，它不是程序语言，而是一种标记语言。它主要控制图片、文字等在浏览器中的表现，以及构建文件之间的链接，这些标记放在纯文本格式的文件之中。
    CSS(Cascading Style Sheets)，即级联样式表，在HTML文档中设立样式表，可以统一控制HTML各标志显示属性。弥补了HTML页面表达能力的不足之处，使页面的字体变得更漂亮，更加容易编排，使页面真正赏心悦目，简化了复杂的代码，将样式写在一个CSS文件中,能够非常容易的对整个页面的样式做出相应的改变。
    JavaScript，用户客户端的脚本语言，给HTML网页增加动态性、对浏览器事件做出响应、读写HTML元素、在数据还没有提交服务器之前，不用与服务器交互，进行简单的数据验证、记录访问者的浏览信息、控制cookie。插件技术，这一技术大大丰富了web应用可展示给用户的内容，常见的有QuickTime，flash等，
    
    2.1.2 web服务器端技术
服务器技术主要指有关Web服务器构建的基本技术，包括服务器策略与结构设计、服务器软硬件的选择及其他有关服务器构建的问题。
最常用的Web服务器是Apache和Microsoft的IIS，可以向客户机提供WWW、Email、FTP等Internet服务。当web浏览器连接到服务器请求文件时，服务器将处理发来的请求并将文件反馈到该浏览器上，附带的一些如头文件信息会告知浏览器如何查看该文件，web服务器不仅能够存储信息，还可以在服务器端根据用户提供的信息运行脚本和程序。
WWW，中文称之为“万维网”。通过万维网，人们通过简单的方法，就可以迅速方便的获取海量的信息，而且无需关注技术细节，界面友好，因而发展迅速。到今天变成不可或缺的技术。

     */
    /**
     * Displays a single Goods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
