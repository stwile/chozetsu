#!/bin/bash

readonly PHPCS_BIN=./vendor/bin/phpcs
readonly PHPMD_BIN=./vendor/bin/phpmd
readonly PHPCS_CODING_STANDARD="./phpcs.xml"
readonly PHPCS_IGNORE=
readonly TMP_STAGING="./.tmp_staging"
readonly PHPMD_RULES="./phpmd.xml"

# simple check if code sniffer is set up correctly
if [ ! -x $PHPCS_BIN ]; then
    echo "PHP CodeSniffer bin not found or executable -> $PHPCS_BIN"
    exit 1
fi

# simple check if mess detector is set up correctly
if [ ! -x $PHPCS_BIN ]; then
    echo "PHP Mess Detector bin not found or executable -> $PHPMD_BIN"
    exit 1
fi

# stolen from template file
if git rev-parse --verify HEAD
then
    against=HEAD
else
    # Initial commit: diff against an empty tree object
    against=4b825dc642cb6eb9a060e54bf8d69288fbee4904
fi

# this is the magic:
# retrieve all files in staging area that are added, modified or renamed
# but no deletions etc
FILES=$(git diff-index --name-only --cached --diff-filter=ACMR $against -- )

if [ "$FILES" == "" ]; then
    exit 0
fi

# create temporary copy of staging area
if [ -e $TMP_STAGING ]; then
    rm -rf $TMP_STAGING
fi
mkdir $TMP_STAGING

# match files against whitelist
FILES_TO_CHECK=""
for FILE in $FILES
do
    echo "$FILE" | egrep -q "$PHPCS_FILE_PATTERN"
    PHPCS_RETVAL=$?
    if [ "$PHPCS_RETVAL" -eq "0" ]
    then
        FILES_TO_CHECK="$FILES_TO_CHECK $FILE"
    fi
done

if [ "$FILES_TO_CHECK" == "" ]; then
    exit 0
fi

# execute the code sniffer
if [ "$PHPCS_IGNORE" != "" ]; then
    IGNORE="--ignore=$PHPCS_IGNORE"
else
    IGNORE=""
fi

if [ "$PHPCS_SNIFFS" != "" ]; then
    SNIFFS="--sniffs=$PHPCS_SNIFFS"
else
    SNIFFS=""
fi

if [ "$PHPCS_ENCODING" != "" ]; then
    ENCODING="--encoding=$PHPCS_ENCODING"
else
    ENCODING=""
fi

if [ "$PHPCS_IGNORE_WARNINGS" == "1" ]; then
    IGNORE_WARNINGS="-n"
else
    IGNORE_WARNINGS=""
fi

# Copy contents of staged version of files to temporary staging area
# because we only want the staged version that will be commited and not
# the version in the working directory
STAGED_FILES=""
for FILE in $FILES_TO_CHECK
do
    ID=$(git diff-index --cached $against $FILE | cut -d " " -f4)

    # create staged version of file in temporary staging area with the same
    # path as the original file so that the phpcs ignore filters can be applied
    mkdir -p "$TMP_STAGING/$(dirname $FILE)"
    git cat-file blob $ID > "$TMP_STAGING/$FILE"
    STAGED_FILES="$STAGED_FILES $TMP_STAGING/$FILE"

    # check php syntax error
    errors=$(php -l "$TMP_STAGING/$FILE" 2>&1 | grep "PHP Parse error" | sed -e "s|.tmp_staging/||")
    if [[ "$errors" ]]; then
        echo $errors
        echo -e "\nPHPファイルに文法エラーがあります。修正してください。"
        rm -rf $TMP_STAGING
        exit 1
    fi
done
echo `pwd`

echo "$PHPCS_BIN -s $IGNORE_WARNINGS --colors --standard=$PHPCS_CODING_STANDARD $ENCODING $IGNORE $SNIFFS $STAGED_FILES"
PHPCS_OUTPUT=$($PHPCS_BIN -s $IGNORE_WARNINGS --colors --standard=$PHPCS_CODING_STANDARD $ENCODING $IGNORE $SNIFFS $STAGED_FILES)
PHPCS_RETVAL=$?

if [ $PHPCS_RETVAL -ne 0 ]; then
    if [ "$FILE_OUTPUT" == "1" ]; then
        echo "$PHPCS_OUTPUT"
        echo "$PHPCS_OUTPUT" > phpcs.log
    else
        echo "$PHPCS_OUTPUT"
    fi
    # delete temporary copy of staging area
    rm -rf $TMP_STAGING

    exit $PHPCS_RETVAL
fi

 echo "$PHPMD_BIN $STAGED_FILES text $PHPMD_RULES"
 PHPMD_OUTPUT=$($PHPMD_BIN $STAGED_FILES text $PHPMD_RULES)
 PHPMD_RETVAL=$?

 if [ $PHPMD_RETVAL -ne 0 ]; then
     if [ "$FILE_OUTPUT" == "1" ]; then
         echo "$PHPMD_OUTPUT"
         echo "$PHPMD_OUTPUT" > phpmd.log
     else
         echo "$PHPMD_OUTPUT"
     fi
     # delete temporary copy of staging area
     rm -rf $TMP_STAGING
     exit $PHPMD_RETVAL
 fi

 exit
