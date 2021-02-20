<li>
    <a href="<?= \yii\helpers\Url::to(['item-category/view', 'id' => $category['id']]) ?>">
        <?= $category['name_uz']?>
        <?php if( isset($category['childs']) ): ?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif;?>
    </a>
    <?php if( isset($category['childs']) ): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif;?>
</li>