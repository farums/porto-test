#!/usr/bin/make
#Varsion Microservices/Auth 1.3.0 01.10.2022 📁
################################################################################
# 👉               ⚙️Makefile Microservices Auth                         👈 #
################################################################################
include ../../Make/Settings/System.mk
include ../../Make/Linux.mk
################################################################################
# 👉                         🧪 Test                                      👈 #
################################################################################
help-Test: #Help: Команды Test
	@$(MAKE) help.Test
test-all: #Test: All
	$(MAKE) phpunit
phpunit: #Test: phpunit
	@vendor/bin/phpunit --colors=always
phpunit.testLogger:
	@vendor/bin/phpunit --colors=always --filter testLogger