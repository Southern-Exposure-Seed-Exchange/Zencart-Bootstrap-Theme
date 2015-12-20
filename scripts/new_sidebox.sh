#!/usr/bin/env bash
# Generate required files for a new sidebox
#
# Usage:    ./new_sidebox.sh <sidebox-name>
# E.g.:     ./new_sidebox.sh my_sidebox

if [ ! $# -eq 1 ]; then
    echo -e "Usage:\n\t./new_sidebox.sh <sidebox-name>\n"
    exit 1
fi
SIDEBOX_NAME="$1"
THEME_NAME="sese-bootstrap"

# Set File Names
SIDEBOX_MODULE_NAME="${SIDEBOX_NAME}_sidebox.php"
SIDEBOX_TEMPLATE_NAME="tpl_${SIDEBOX_MODULE_NAME}"
SIDEBOX_LANGUAGE_DEFINES_NAME="${SIDEBOX_NAME}_sidebox_defines.php"

# Set Variable Names
SHOW_SIDEBOX_VAR_NAME="\$show_${SIDEBOX_NAME}_sidebox"
SIDEBOX_HEADING_VAR_NAME="BOX_HEADING_${SIDEBOX_NAME^^}_SIDEBOX"
SIDEBOX_TEMPLATE_VAR_NAME="\$${SIDEBOX_NAME}_template"

# Generate Sidebox Module
cat > "theme/modules/sideboxes/${THEME_NAME}/${SIDEBOX_MODULE_NAME}" <<PHP
<?php
/** TODO: Describe the purpose of the sidebox here. */
${SHOW_SIDEBOX_VAR_NAME} = true;
if (${SHOW_SIDEBOX_VAR_NAME} === true) {
  ${SIDEBOX_TEMPLATE_VAR_NAME} = '${SIDEBOX_TEMPLATE_NAME}';
  require(\$template->get_template_dir(
    ${SIDEBOX_TEMPLATE_VAR_NAME}, DIR_WS_TEMPLATE, \$current_page_base, 'sideboxes'
  ) .  '/' . ${SIDEBOX_TEMPLATE_VAR_NAME});
  \$title = ${SIDEBOX_HEADING_VAR_NAME};
  \$left_corner = \$right_corner = \$right_arrow = false;
  require(\$template->get_template_dir(
    \$column_box_default, DIR_WS_TEMPLATE, \$current_page_base, 'common'
  ) .  '/' . \$column_box_default);
}

?>
PHP

# Generate Sidebox Language Definitions
cat > "theme/languages/english/extra_definitions/${THEME_NAME}/${SIDEBOX_LANGUAGE_DEFINES_NAME}" <<PHP
<?php
/** Language Definitions for the ${SIDEBOX_NAME} Sidebox */
define('${SIDEBOX_HEADING_VAR_NAME}', '');
?>
PHP

# Generate Sidebox Template
cat > "theme/templates/${THEME_NAME}/sideboxes/${SIDEBOX_TEMPLATE_NAME}" <<PHP
<?php
/** Set the Content of the ${SIDEBOX_NAME} Sidebox */
\$content = <<<HTML
TODO: CHANGE ME
HTML;
?>
PHP
