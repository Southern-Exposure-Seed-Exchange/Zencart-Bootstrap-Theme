#!/usr/bin/env bash
# Link the theme files to the approriate folders in a Zencart installation.
main() {
    ZENCART_ROOT="$1/"
    INCLUDES_DIR="$ZENCART_ROOT/includes"
    THEME_DIR_NAME="sese-bootstrap"

    TEMPLATES="$INCLUDES_DIR/templates/$THEME_DIR_NAME"
    if [ ! -e $TEMPLATES ]; then
        ln -s "$PWD/theme/templates/$THEME_DIR_NAME/" "$TEMPLATES"
    fi
}

if [[ $# -ne 1 ]]; then
    echo -e "Usage:\n\t./install.sh <path-to-zencart-root>\n"
else
    main "$1"
fi
