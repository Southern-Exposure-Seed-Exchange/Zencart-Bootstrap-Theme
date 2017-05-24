#!/usr/bin/env bash
# Link the theme files to the approriate folders in a Zencart installation.
main() {
    ZENCART_ROOT="$1/"
    INCLUDES_DIR="$ZENCART_ROOT/includes"
    THEME_DIR_NAME="sese-bootstrap"
    FOLDERS_TO_LINK=('templates'
                     'modules'
                     'modules/sideboxes'
                     'languages'
                     'languages/english'
                     'languages/english/extra_definitions'
                     'languages/english/html_includes'
                     'languages/english/modules/payment'
                     'languages/english/modules/shipping')

    # Link Folders
    for FOLDER_TO_LINK in ${FOLDERS_TO_LINK[@]}; do
        SITE_FOLDER="$INCLUDES_DIR/$FOLDER_TO_LINK/$THEME_DIR_NAME"
        THEME_FOLDER="$PWD/theme/$FOLDER_TO_LINK/$THEME_DIR_NAME"
        if [ ! -e $SITE_FOLDER ]; then
            ln -f -s "$THEME_FOLDER" "$SITE_FOLDER"
        fi
    done

    # Link Function Files
    for THEME_FILE in $PWD/theme/functions/*.php; do
        FILE_NAME=$(basename $THEME_FILE)
        SITE_FILE="$INCLUDES_DIR/functions/extra_functions/$FILE_NAME"
        if [ ! -e $SITE_FILE ]; then
            ln -f -s "$THEME_FILE" "$SITE_FILE"
        fi
    done

    # Link Class Files
    for THEME_FILE in $PWD/theme/classes/*.php; do
        FILE_NAME=$(basename $THEME_FILE)
        SITE_FILE="$INCLUDES_DIR/classes/$FILE_NAME"
        if [ ! -e $SITE_FILE ]; then
            ln -f -s "$THEME_FILE" "$SITE_FILE"
        fi
    done

    # Link the Autoloader File
    AUTOLOADER_FILE_NAME='config.sese_bootstrap.php'
    THEME_FILE="$INCLUDES_DIR/auto_loaders/$AUTOLOADER_FILE_NAME"
    if [ ! -e $THEME_FILE ]; then
      ln -f -s "$PWD/theme/auto_loaders/$AUTOLOADER_FILE_NAME" "$THEME_FILE"
    fi

    # Set Correct Permissions on HTML Includes
    chmod g+w -R "$INCLUDES_DIR/languages/english/html_includes/$THEME_DIR_NAME"
    sudo chgrp www-data -R "$INCLUDES_DIR/languages/english/html_includes/$THEME_DIR_NAME"
}

if [[ $# -ne 1 ]]; then
    echo -e "Usage:\n\t./install.sh <path-to-zencart-root>\n"
else
    main "$1"
fi
