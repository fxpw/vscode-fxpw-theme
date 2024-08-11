<?= tView::incOffice('top') ?>
<section class="section-content">
	<div class="container">
		<?= tView::incOffice('nav.profile', []) ?>

		<div class="row">
			<div class="col-xl-8">
				<form class="form form-ajax" onsubmit="return false;" method="post"
					action="<?= tRoute::get('office.profile.update') ?>">
					<?= csrf_field() ?>
					<?= method_field('PUT') ?>
					<div class="row">
						<div class="col-6">
							<?= tView::inc('form-field', [
											'name' => 'name',
											'label' => 'Имя пользователя (уникальный псевдоним)',
											'data' => tUser::get(),
							]) ?>
						</div>
						<div class="col-6">
							<?= tView::inc('form-field', [
											'name' => 'name_changer',
											'type' => 'select',
											'label' => 'Выберите вариант отображения',
											'value' => tUser::arrayOfMemberNamesOnView(),
											'selected' => tUser::selectedName(),
											'selected_value_id' => tUser::get()->getNameChanger(),
							]) ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<?= tView::inc('form-field', [
											'name' => 'meta.last_name',
											'label' => 'Фамилия',
											'data' => tUser::get(),
											//                                    'required' => true,
							]) ?>
						</div>
						<div class="col-md">
							<?= tView::inc('form-field', [
											'name' => 'meta.first_name',
											'label' => 'Имя',
											'data' => tUser::get(),
											//                                    'required' => true,
							]) ?>
						</div>
						<div class="col-md">
							<?= tView::inc('form-field', [
											'name' => 'meta.middle_name',
											'label' => 'Отчество',
											'data' => tUser::get(),
							]) ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<div>
								<label class="mb-2">Email</label>
								<div class="input-group mb-2">
									<input class="form-control" disabled value="<?= tUser::get()->email ?>">
								</div>
							</div>
							<div>
								<label class="mb-2">Номер Телефона</label>
								<div class="input-group mb-2">
									<input class="form-control" disabled value="<?= tUser::get()->phone ?>">
								</div>
							</div>
							<label class="mb-2">Ссылка на профиль</label>
							<div class="input-group mb-2">
								<input class="form-control" disabled value="{{ route('members.show', tUser::get()->id) }}">
								<a href="{{ route('members.show', tUser::get()->id) }}" class="btn btn-secondary">
									<i class="fa fa-external-link-alt"></i>
								</a>
							</div>
						</div>
						<div class="col-6  col-sm-auto col-md-4">
							<label class="form-label">Аватар</label>
							<div class="square input-image-result">

								<div id="image_preview"
									class="square-img input-image-result__preview"<?= isset($item) ? sprintf(' style="background-image: url(\'%s\')"', $item->getImageUrl()) : '' ?>>
								</div>
							</div>
							<div class="font-italic text-md-right">
								<strong>Требования к изображению:</strong>
								<div>300x300 - 1500x1500</div>
								<div>JPG, PNG</div>
							</div>
							<input id="image_inp" class="d-none" name="image" type="file" accept=".jpg,.jpeg,.png">
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<?= tView::inc('form-field', [
											'name' => 'meta.about',
											'type' => 'textarea',
											'label' => 'О себе',
											'data' => tUser::get(),
											'class' => 'resizable-textarea',
											'rows' => '4',
							]) ?>
						</div>
					</div>
					<hr>
					<div class="form-response"></div>
					<button type="submit" class="btn btn-primary">
						<span>Сохранить</span>
					</button>
				</form>
				<a class="btn btn-primary mt-3" href="/update/email">
					<span>Изменить Email</span>
				</a>
				<a class="btn btn-primary mt-3" href="/update/phone">
					<span>Изменить Номер Телефона</span>
				</a>

				<a class="btn btn-primary mt-3" href="/user/password/updatePassword">
					<span>Изменить пароль</span>
				</a>

				<button class="btn btn-secondary mt-3" type="button" onclick="Core.logout('<?= tRoute::get('signup') ?>', this);">
					<span><?= __('Logout') ?></span>
				</button>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	(function(w) {
		(w.__fns = w.__fns || []).push(function($) {
			Core.maskPhone('[type="tel"]');

			(function() {
				var $file = $('#image_inp');
				var $preview = $('#image_preview');

				$preview.on('click', function(e) {
					$file.trigger('click');
				});
				$file.on('change', function() {
					if (this.files && this.files[0]) {
						var fr = new FileReader();
						fr.onload = function(e) {
							$preview.css('background-image', 'url(' + e.target.result + ')');
						}
						fr.readAsDataURL(this.files[0]);
					}
				});
			})();
		})
	})(window);
</script>
<?= tView::incOffice('bottom') ?>
