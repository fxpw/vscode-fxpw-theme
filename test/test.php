<?php
Route::get('/', 'IndexController@index')->name('index');
Route::get('edit', 'IndexController@edit')->name('edit');
Route::put('/', 'IndexController@update')->name('update');
Route::get('/updateEmail', 'IndexController@updateEmailPage')->name('updateEmailPage');
Route::put('/update', 'IndexController@updateEmail')->name('updateEmail');

Route::group([
	'namespace' => 'Payment',
	'prefix' => 'payments',
	'as' => 'payments.',
], function(){
	Route::group([
		'prefix' => '{payment}',
	], function(){
		Route::get('select', 'IndexController@select')->name('select');
		Route::post('pay', 'IndexController@pay')->name('pay');
	});

	Route::get('/', 'IndexController@index')->name('index');
});

Route::group([
	'namespace' => 'Order',
	'prefix' => 'orders',
	'as' => 'orders.',
], function(){
	Route::get('make', 'IndexController@make')->name('make');
	Route::post('/', 'IndexController@store')->name('store');

	Route::get('/', 'IndexController@index')->name('index');
	Route::group([
		'prefix' => '{order}',
	], function(){
		Route::get('/', 'IndexController@show')->name('show');

		Route::get('to_payment', 'IndexController@toPayment')->name('to_payment');
	});
});

Route::group([
	'namespace' => 'Favorite',
	'prefix' => 'favorites',
	'as' => 'favorites.',
], function(){
	Route::get('/', 'IndexController@index')->name('index');
});

Route::group([
    'namespace' => 'Like',
    'prefix' => 'like',
    'as' => 'like.',
], function(){
    Route::get('/', 'IndexController@index')->name('index');

});

Route::group([
	'namespace' => 'Service',
	'prefix' => 'services',
	'as' => 'services.',
], function(){
	Route::get('make/{course}', 'IndexController@make')->name('make');
	Route::post('make/{course}', 'IndexController@create')->name('create');

	Route::get('/', 'IndexController@index')->name('index');
	Route::get('{order}', 'IndexController@show')->name('show');
});

Route::group([
	'namespace' => 'Education',
	'prefix' => 'educations',
	'as' => 'educations.',
], function(){
	Route::post('{course}/buy', 'IndexController@buy')->name('buy');

	Route::group([
		'prefix' => '{order}',
	], function(){
		Route::group([
			'prefix' => '{module}',
			'as' => 'modules.',
		], function(){
			Route::group([
				'prefix' => '{lesson}',
				'as' => 'lessons.',
			], function(){
				Route::get('/', 'LessonsController@show')->name('show');
				Route::post('action/{action}', 'LessonsController@action')->name('action');
			});

			Route::get('/', 'ModulesController@show')->name('show');
		});

		Route::get('/', 'IndexController@show')->name('show');
	});

	Route::get('/', 'IndexController@index')->name('index');
});

Route::group([
	'namespace' => 'Chat',
	'prefix' => 'chats',
	'as' => 'chats.',
], function(){
	Route::get('/', 'IndexController@index')->name('index');
	Route::get('{chat}', 'IndexController@show')->name('show');
});

/* Spaces */
// dsagfasgsa
Route::group([
	'namespace' => 'Space',
], function(){
	Route::group([
		'prefix' => 'spaces',
		'as' => 'spaces.',
	], function(){
		Route::group([
			'prefix' => '{space}',
		], function(){
			Route::post('action/{action}', 'IndexController@action')->name('action');

			/* Images */
			Route::group([
				'prefix' => 'images',
				'as' => 'images.',
			], function(){
				Route::group([
					'prefix' => '{image}',
				], function(){
					Route::post('action/{action}', 'ImagesController@action')->name('action');
				});

				Route::post('upload', 'ImagesController@upload')->name('upload');
			});
			Route::resource('images', 'ImagesController');

			/* Products */
			Route::group([
				'namespace' => 'Product',
			], function(){
				Route::group([
					'prefix' => 'products',
					'as' => 'products.',
				], function(){
					Route::group([
						'prefix' => '{product}',
					], function(){
						Route::post('action/{action}', 'IndexController@action')->name('action');

						Route::post('upload', 'IndexController@upload')->name('upload');
					});

					Route::group([
						'prefix' => 'warehouses',
						'as' => 'warehouses.',
					], function(){

					});
					Route::resource('warehouses', 'WarehousesController')->only([
						'create', 'store', 'edit', 'update',
					]);
				});
				Route::resource('products', 'IndexController')->except([
					'show',
				]);

				Route::group([
					'prefix' => 'product_orders',
					'as' => 'product_orders.',
				], function(){

				});
				Route::resource('product_orders', 'OrdersController')->only([
					'index', 'show',
				]);
			});

			/* Services */
			Route::group([
				'namespace' => 'Service',
			], function(){
				Route::group([
					'prefix' => 'services',
					'as' => 'services.',
				], function(){

				});

				Route::resource('services', 'IndexController');

				Route::group([
					'prefix' => 'service_orders',
					'as' => 'service_orders.',
				], function(){

				});
				 Route::resource('service_orders', 'OrdersController')->only([
				 	'index', 'show',
				 ]);
			});

			/* Educations */
			Route::group([
				'namespace' => 'Education',
			], function(){
				Route::group([
					'prefix' => 'educations',
					'as' => 'educations.',
				], function(){
					Route::group([
						'prefix' => '{education}',
					], function(){
						Route::post('action/{action}', 'IndexController@action')->name('action');

						Route::post('upload', 'IndexController@upload')->name('upload');

						Route::group([
							'prefix' => 'modules',
							'as' => 'modules.',
						], function(){
							Route::group([
								'prefix' => '{module}',
							], function(){
								Route::resource('lessons', 'LessonsController')->except([
									'show',
								]);
							});
						});
						Route::resource('modules', 'ModulesController')->except([
							'show',
						]);

						Route::group([
							'namespace' => 'Order',
						], function(){
							Route::group([
								'prefix' => 'orders',
								'as' => 'orders.',
							], function(){
								Route::group([
									'prefix' => '{order}',
								], function(){
									Route::post('action/{action}', 'IndexController@action')->name('action');

									Route::group([
										'prefix' => 'lessons',
										'as' => 'lessons.',
									], function(){
										Route::group([
											'prefix' => '{lesson}',
										], function(){
											Route::get('/', 'LessonsController@show')->name('show');
											Route::post('action/{action}', 'LessonsController@action')->name('action');
										});
									});
								});
							});
							Route::resource('orders', 'IndexController')->only([
								'index', 'show',
							]);
						});
					});
				});
				Route::resource('educations', 'IndexController')->except([
					'show',
				]);

				Route::group([
					'prefix' => 'education_orders',
					'as' => 'education_orders.',
				], function(){

				});
				Route::resource('education_orders', 'OrdersController')->only([
					'index', 'show',
				]);
			});

			/* Chats */
			Route::group([
				'namespace' => 'Chat',
			], function(){
				Route::resource('chats', 'IndexController');
			});
		});
});
Route::resource('spaces', 'IndexController')->except([
	'index',
]);
});

/* Comments */
Route::group([
	'prefix' => 'commentable',
	'as' => 'commentable.',
], function(){
	Route::post('/', 'CommentableController@store')->name('store');
});

/* Files */
Route::group([
	'prefix' => 'file',
	'as' => 'file.',
], function(){
	Route::group([
		'prefix' => '{file}',
	], function(){
		Route::get('/', 'FileController@content')->name('content');
		Route::get('dwnld', 'FileController@download')->name('download')->middleware('throttle:120,1');
	});
});

Route::group([
	'namespace' => 'Referral',
	'prefix' => 'referrals',
	'as' => 'referrals.',
], function(){
	Route::get('/', 'IndexController@index')->name('index');

	Route::post('childs', 'IndexController@childs');
});
