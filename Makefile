SASS_DIR="./theme/templates/sese-bootstrap/sass/"
CSS_DIR="./theme/templates/sese-bootstrap/css/"

watch:
	scss --sass --sourcemap=inline --watch ${SASS_DIR}:${CSS_DIR}

build:
	scss --sass --sourcemap=inline --update ${SASS_DIR}:${CSS_DIR}

dist:
	scss --sass --sourcemap=none -t compressed --update ${SASS_DIR}:${CSS_DIR}
