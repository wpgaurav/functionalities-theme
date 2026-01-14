#!/bin/bash

# Configuration
THEME_NAME="functionalities-theme"
DEST_PATH="/Users/gauravtiwari/Studio/gtetch/wp-content/themes"
STYLE_CSS="style.css"
FUNCTIONS_PHP="functions.php"

# 1. Get current version from style.css
CURRENT_VERSION=$(grep -m 1 "Version:" "$STYLE_CSS" | awk '{print $NF}')
echo "Current version: $CURRENT_VERSION"

# 2. Bump version (patch version: 1.0.x)
IFS='.' read -r major minor patch <<< "$CURRENT_VERSION"
NEW_PATCH=$((patch + 1))
NEW_VERSION="$major.$minor.$NEW_PATCH"
echo "New version: $NEW_VERSION"

# 3. Update version in style.css
sed -i '' "s/Version: $CURRENT_VERSION/Version: $NEW_VERSION/" "$STYLE_CSS"

# 4. Update version in functions.php
sed -i '' "s/define( 'FT_VERSION', '$CURRENT_VERSION' );/define( 'FT_VERSION', '$NEW_VERSION' );/" "$FUNCTIONS_PHP"

# 5. Copy to destination
echo "Copying clean theme to $DEST_PATH/$THEME_NAME..."

# Create destination path if it doesn't exist
mkdir -p "$DEST_PATH"

# Use rsync to copy and exclude unwanted development files
rsync -av --delete \
  --exclude '.git/' \
  --exclude '.gitignore' \
  --exclude '.DS_Store' \
  --exclude 'PLAN.md' \
  --exclude 'my-plan.md' \
  --exclude 'README.md' \
  --exclude 'deploy.sh' \
  ./ "$DEST_PATH/$THEME_NAME/"

echo "----------------------------------------------------"
echo "✅ Success! Deployed version $NEW_VERSION to $DEST_PATH"
echo "----------------------------------------------------"
