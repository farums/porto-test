#!/usr/bin/make
#Varsion Settings/Linux/help 7.0 16.06.2022 ⚙️
#----------------------  help   --------------------------
.DEFAULT_GOAL := help-default
help: #Help: Show help text
	@printf "\033[33m##:\033[0m\n"
	@awk 'BEGIN {FS = ":.*?## "} /^[.%a-zA-Z_-]+:.*?## / {printf "   \033[31m make \033[36m%-25s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)
help-default:
	@$(MAKE) help-auto
help.%: #Help: help.-% (Help | Linux | Test | Dev | Settings)
	@printf "\033[33m$*:\033[0m\n"
	@for fileX in $(MAKEFILE_LIST); do \
		grep -E '^[.%a-zA-Z_-]+:.*?$*: .*$$' $$fileX | \
		awk 'BEGIN {FS = ":.*?$*: "}; {printf "   \033[31m make \033[36m%-25s\033[0m %s\n", $$1, $$2}'; \
	done
#----------------------  Авто запуск help   --------------------------
help-auto:
	@echo Auto-Help для просмотра выводимых вайл выполните make help.Help
	@ for fileX in $(MAKEFILE_LIST); do \
		 grep -E '^[a-zA-Z_-]+:.*?Help: .*$$' $$fileX  \
		 | awk 'BEGIN {FS = ":.*?Help: "};{ print $$1}'  \
		 | xargs -r $(MAKE) \
		 ; \
	done