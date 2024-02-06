<div class="modal-wrap container">
	<form class="form form-ajax" onsubmit="return false;" method="post" action="<?=isset($item) ? tRoute::get('admin.links.update', $item) : tRoute::get('admin.links.store')?>">
		<?=csrf_field()?>
		<?php if( isset($item) ) { ?>
			<?=method_field('PUT')?>
		<?php } ?>
		<h2 class="my-1 py-1">
			<span><?=tPage::h1()?></span>
			<?php if( isset($item) ) { ?>
				<span class="text-secondary small">(<?=$item->id?>)</span>
			<?php } ?>
		</h2>
		<?=tView::inc('alert')?>
		<hr class="border-secondary">
		<?=tView::inc('form-field',[
			'name' => 'link',
			'label' => 'Относительная ссылка',
			'data' => isset($item) ? $item : null,
			'required' => true,
		])?>
		<hr class="border-secondary">
		<div class="form-response"></div>
		<div class="row justify-content-end">
			<div class="col-auto">
				<button type="submit" class="btn btn-primary">
					<span>Сохранить</span>
				</button>
				<?=tView::incAdmin('btn-close')?>
			</div>
		</div>
	</form>
</div>