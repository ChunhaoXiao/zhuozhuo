<?php
return [
	'title' => [
		'label' => '标题',
		'type' => 'text',
	],

	'logo' => [
		'type' => 'file',
		'label' => '网站logo',
	],

	'logo_text' => [
		'type' => 'text',
		'label' => 'logo右侧文字',
	],

	'swiper_text_top' => [
		'type' => 'text',
		'label' => '轮播图文字(上)',
	],

	'swiper_text_bottom' => [
		'type' => 'text',
		'label' => '轮播图文字(下)',
	],

	'keyword' => [
		'type' => 'text',
		'label' => '关键字',
	],

	'description' => [
		'type' => 'text',
		'label' => '描述',
	],

	'banner' => [
		'type' => 'file',
		'label' => '首页banner',
		'multiple' => true,
	],

	'soft_background' => [
		'type' => 'file',
		'label' => '首页软件介绍背景图'
	],

	'index_news_picture' => [
		'type' => 'file',
		'label' => '首页新闻资讯图'
	],

	'copy_right' => [
		'type' => 'text',
		'label' => '版权信息',
	],

	'approve_number' => [
		'type' => 'text',
		'label' => '备案号',
	],

	'enabled' => [
		'type' => 'radio',
		'label' => '是否允许访问',
		'options' => [
			0 => '不允许',
			1 => '允许'
		],
		'checked' => '1',
	],

	'statistic_code' => [
		'type' => 'textarea',
		'label' => '第三方统计代码',
	],

	'allow_message' => [
		'type' => 'radio',
		'label' => '是否允许留言',
		'options' => [
			0 => '不允许',
			1 => '允许',
		],
		'checked' => '1',
	],
];