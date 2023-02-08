install:
	docker-compose run php-test sh -c "composer install"

update:
	docker-compose run php-test sh -c "composer update"

.PHONY: tests
tests:
	docker-compose run php-test sh -c "php -v && ./vendor/bin/phpunit tests"
