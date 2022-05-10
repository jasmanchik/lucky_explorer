current_dir := $(abspath $(patsubst %/,%,$(dir $(abspath $(lastword $(MAKEFILE_LIST))))))
#run container
init:
	docker-compose down --remove-orphans
	docker-compose pull
	docker-compose build --pull
	docker-compose up -d

#install framework, if a project is a new one
framework:
	docker-compose exec app composer create-project laravel/laravel application

#install composer packages
ci:
	docker run --rm --volume $(current_dir)/app:/app composer install
cu:
	docker run --rm --volume $(current_dir)/app:/app composer update

#shut down container
down:
	docker-compose down --remove-orphans
#-v

mix:
	docker-compose exec app sh -c "npx mix"

mixw:
	docker-compose exec app sh -c "npx mix watch"

#migrations
migrate:
	docker-compose exec app sh -c "php artisan migrate"
migrate-fresh:
	docker-compose exec app sh -c "php artisan migrate:fresh"
migrate-fresh-seed:
	docker-compose exec app sh -c "php artisan migrate:fresh --seed"