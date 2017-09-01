<?php
namespace backend\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class MainMenuAdmin extends Widget
{
    public function run(){
        echo \yii\widgets\Menu::widget(
            [
                'items' => [
                    [
                        'label' => 'Пользователи',
                        'url' => Url::to(['/user/admin']),
                        'template' => '<a href="{url}"><i class="fa fa-users"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'user' || Yii::$app->controller->module->id == 'rbac',

                    ],
                    [
                        'label' => 'Категории',
                        'url' => Url::to(['/category/category']),
                        'template' => '<a href="{url}"><i class="fa fa-certificate"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'category',
                    ],
                    [
                        'label' => 'Продукты',
                        'url' => Url::to(['/product/product']),
                        'template' => '<a href="{url}"><i class="fa fa-cart-plus"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'product',
                    ],
                ],
                'activateItems' => true,
                'activateParents' => true,
                'activeCssClass'=>'active',
                'encodeLabels' => false,
                /*'dropDownCaret' => false,*/
                'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",
                'options' => [
                    'class' => 'sidebar-menu',
                ]
            ]
        );
    }
}