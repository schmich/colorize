test:
	./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/*

docs: src/*.php
	vendor/bin/apigen generate src --destination docs

doc: docs
