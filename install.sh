#!/usr/bin/env bash
# Link the theme files to the approriate folders in a Zencart installation.
main() {
    ZENCART_ROOT="$1/"
    INCLUDES_DIR="$ZENCART_ROOT/includes"
    THEME_DIR_NAME="sese-bootstrap"
    FOLDERS_TO_LINK=('templates'
                     'languages'
                     'languages/english'
                     'languages/english/extra_definitions'
                     'languages/english/html_includes'
                     'languages/english/modules/payment'
                     'languages/english/modules/shipping')

    for FOLDER_TO_LINK in ${FOLDERS_TO_LINK[@]}; do
        SITE_FOLDER="$INCLUDES_DIR/$FOLDER_TO_LINK/$THEME_DIR_NAME"
        THEME_FOLDER="$PWD/theme/$FOLDER_TO_LINK/$THEME_DIR_NAME"
        if [ ! -e $SITE_FOLDER ]; then
            ln -s "$THEME_FOLDER" "$SITE_FOLDER"
        fi
    done

}

if [[ $# -ne 1 ]]; then
    echo -e "Usage:\n\t./install.sh <path-to-zencart-root>\n"
else
    main "$1"
fi
