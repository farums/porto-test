#!/usr/bin/make
Settings_DIR := $(abspath $(patsubst %/,%,$(dir $(abspath $(lastword $(MAKEFILE_LIST))))))

include $(Settings_DIR)/All/no-print-directory.mk
include $(Settings_DIR)/All/args.mk
include $(Settings_DIR)/All/print.mk
include $(Settings_DIR)/All/versions.mk

ifneq ($(OS),Windows_NT)
	include $(Settings_DIR)/Linux/*.mk
endif

help-Settings: #Help: Запуск всех Help
	@$(MAKE) help.Settings


