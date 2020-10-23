setup:
	composer install

lint:
	composer phpcs

lint-fix:
	composer phpcbf

log:
	tail -f storage/logs/laravel.log
	