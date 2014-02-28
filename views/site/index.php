<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
$this->title = 'Yiier yii2天朝社区';
?>
<div class="site-index">
	<div class="panel panel-default">
	  <div class="panel-body">
	    Yiier，对！没错！这里就是 yii2 社区，目前这里已经是国内最权威的 yii2 社区，拥有国内所有资深的 yii2 工程师。
	  </div>
	</div>

	<div class="row">
		<div class="col-lg-10">
			<div class="bs-example">
				<?php foreach ($topics as $key => $value): ?>
			    <div class="media">
			      <a class="pull-left" href="#">
			        <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIj48L3JlY3Q+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;"> <br> <?= $value->user->username ?>
			      </a>
			      <div class="media-body">
			        <h4 class="media-heading"><?= Html::a(Html::encode($value->title), ['topic/view', 'id' => $value->id]) ?> <small><?= date('Y-m-d H:i:s',$value->created_at) ?></small></h4>
			        <?= Html::encode($value->source) ?>
			      </div>
			    </div>
			    <?php endforeach ?>
			</div>
		</div>
		<div class="col-lg-2">
			节点
		</div>

	
</div>
</div>
