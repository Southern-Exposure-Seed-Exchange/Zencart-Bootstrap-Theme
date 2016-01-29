# CSS Commands
SASS_DIR="./theme/templates/sese-bootstrap/sass/"
CSS_DIR="./theme/templates/sese-bootstrap/css/"
watch:
	scss --sass --precision 10 --sourcemap=inline --watch ${SASS_DIR}:${CSS_DIR}

build:
	scss --sass --precision 10 --sourcemap=inline --update ${SASS_DIR}:${CSS_DIR}

dist:
	scss --sass --precision 10 --sourcemap=none -t compressed --update ${SASS_DIR}:${CSS_DIR}

# Installation
install:
ifndef ZENCART_PATH
	$(error ZENCART_PATH is undefined)
endif
	./scripts/install.sh ${ZENCART_PATH}

# Code Generation
sidebox:
ifndef NAME
	$(error NAME is undefined)
endif
	./scripts/new_sidebox.sh ${NAME}
