#!/usr/bin/make
#Varsion Linux/Composer 1.1 18.10.2022 🐘
################################################################################
# 👉                       🐘 Composer                                    👈 #
################################################################################
help-Composer-update: #Help: Команды Composer
	@$(MAKE) help.Composer
serve: 					 #Composer: 🐘  serve 🌐 run
	@composer serve
composer-show:
	@composer show -s
composer-install:        #Composer: 🐘 install
	@composer install
composer-update-dev:     #Composer: 🐘 Composer-update 🐞 Dubag
	@composer update
composer-update:         #Composer: 🐘 Composer-update
	@composer update --no-dev
composer-show-platform:  #Composer: 🐘 Composer platform
	@composer show --platform
composer-outdated:       #Composer: 🐘 Composer up list
	@composer outdated --all
composer-validate:       #Composer: 🐘 Composer validate
	@composer validate --no-interaction
composer-dump-autoload:  #Composer: 🐘 regenerate the Composer autoload files
	@composer dump-autoload