#!/bin/bash

# Ruta del proyecto
PROJECT_DIR="C:\laragon\www\v_page_n"

# Mensaje de commit
COMMIT_MESSAGE="Cambios realizados automáticamente"

# Cambiar al directorio del proyecto
cd $PROJECT_DIR

# Ejecutar los comandos de Git
git add .
git commit -m "$COMMIT_MESSAGE"
git push origin main