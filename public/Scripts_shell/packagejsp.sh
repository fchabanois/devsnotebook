#!/bin/sh
################################################################################
#         packagejsp.sh
#                                        
#         Make a TAR FILE containing all the modifications of the webapp
#            from a given revision number
#
#-------------------------------------------------------------------------------
# TODO
#-------------------------------------------------------------------------------
#     - do a ZIP format file (may not be necessary considering the option --preserve-permissions)
#
#-------------------------------------------------------------------------------
# Revisions
#-------------------------------------------------------------------------------
#         #1 : a file is zipped only once
#            #2 (30 june 2008) :         rollback option V0#                                                            
#            #3 (1 july 2008) : bugfixed files zipped several times when the dir and a file inside has been updated
#                               other link than trunk taken into account
#                               check of the return value of each line, to have the errors somewhere                                                        
#            #4 (2 july 2008) : other link than trunk takes into account with option sl
#                               errors displayed at the end of the script
#                               readme file in the creation of the zip
#                               absolute path changed to relative path (to make the zip without "cygwin" etc and allow the script to be launched from anywhere)
#                               deletion of line containing packagejsp.sh (we don't wan't it in the zip)
#            #5 (3 july 2008) : head revision is now changeable via argument
#                               directories aren't zipped to avoid unwanted files inside the tar (.svn and duplicate files)
#                               delete only if exists
#            #6 (4 july 2008) : there was no compression => now gzipped
#            #7 (9 july 2008) : only trunk wanted.
#                               package the zip from where we launch the script
#                               target deleted if exists and recreated
#            #8 (10 july 2008) : Lines containing "Merging from" and "end of Merging from" suppressed.
#                               Only first element of line zipped
#                               When dir, svn update done even if no zip is done
#
#            TODO exclure les fichiers .tld de WEB-INF et le repertoire logos/
################################################################################

export PROJECT_ROOT_PATH=`pwd`
export TARGET_DIR=./target
export TMP_OUTPUT_FILE=${TARGET_DIR}/modifiedJSPs.tmp
export UNIQUES=${TMP_OUTPUT_FILE}_uniques
export FINAL=${TMP_OUTPUT_FILE}_final
export OUTPUT_ZIP=${TARGET_DIR}/jspModifieds.tar
export OUTPUT_ZIP_ROLLBACK=${TARGET_DIR}/jspModifieds_ROLLBACK.tar
export PACKAGE_ROLLBACK="false";
export STRING_TO_REPLACE="/myProjectName/trunk/myProjectName-webapp"
#export STRING_TO_REPLACE="$STRING_TO_REPLACE /myProjectName/branches/refonte-myProjectName-2008-2/myProjectName-webapp"
export REVISION=""
export HEAD="HEAD"
export README_FILE="README"
export REPLACE_BY="."
export CMD_USED="$0 $*"
#
# Display Help
#
display_help(){
    echo ""
    echo "Make a TAR FILE containing all the modifications of the webapp from a given revision number or a date."
    echo ""
    echo "WARNING : The files are updated from SVN before being put in the Tar."
    echo ""
    echo " [-r REV]"                
    echo " [--revision REV]    Take from the revision or date REV. Date format: {YYYY-MM-dd}"
    echo "            REQUIRED"
    echo ""
    echo " [-hr REV]"                
    echo " [--headrevision REV]    Take to the revision or date REV. Date format: {YYYY-MM-dd}"
    echo "            by default: HEAD"
    echo ""
    echo " [-dr]"                
    echo " [--dorollback]    Also make a zip containing the rollback with the former version"
    echo "            by default: not activated"
    echo ""
    echo " [-sl STRING_TO_REPLACE]"                
    echo " [--svnlinktoreplace STRING_TO_REPLACE]    "
    echo "            represents the string that will be replaced by local link : ${REPLACE_BY}"
    echo "            STRING_TO_REPLACE will be added to the current value of STRING_TO_REPLACE."
    echo "            by default: ${STRING_TO_REPLACE}"
    echo ""
    echo " [-h]"
    echo " [--help]        Display help"
}

#
# Arguments parsing
#
until [[ $# -eq 0 ]];do      
        case "$1" in
        -r | --revision)
                        REVISION=$2;
                        echo "From the revision : $REV";                
                ;;
        -hr | --headrevision)
                        HEAD=$2;
                        echo "To the revision : $HEAD";                
                ;;
        -dr | --dorollback)
                        export PACKAGE_ROLLBACK="true";
                        echo "Also package rollback versions of JSP : ACTIVATED.";                
                ;;                
        -sl | --svnlinktoreplace)
                        STRING_TO_REPLACE="$STRING_TO_REPLACE $2"
                        echo "Svn link to replace by local path : ${STRING_TO_REPLACE}";
                ;;                        
        -h | --help)
                        display_help
                exit 1
                ;;
        *)
                ;;
        esac      
   shift               
done                   

#
# Check mandatory arguments
#
if [ "$REVISION" = "" ];then
    echo ""
    echo "=== ERROR : INVALID ARGUMENTS. REVISION IS REQUIRED ! ==="
    echo ""
    display_help
    echo ""
    exit 2
fi


echo "Create readme file.."
display_help > $README_FILE
echo "" >> $README_FILE
echo "==========" >> $README_FILE
echo "" >> $README_FILE
echo "Package generated from version $REVISION to $HEAD" >> $README_FILE
echo "" >> $README_FILE
echo "The command user was : ${CMD_USED}" >> $README_FILE
date  >> $README_FILE


# Create target dir if not exists
if [ -e $TARGET_DIR ]; then
    rm -R $TARGET_DIR;
fi    
mkdir $TARGET_DIR;

echo "Get svn history from myProjectName from revision $REVISION.."
svn log . --verbose -r ${REVISION}:${HEAD} | grep "/myProjectName" > ${TMP_OUTPUT_FILE}

cat $TMP_OUTPUT_FILE

echo "Replace svn link(s)  by local link..."
echo "        svn links : $STRING_TO_REPLACE"
echo "        local link : $REPLACE_BY"
for svnlink in $STRING_TO_REPLACE;    
do 
    sed -i s#$svnlink#${REPLACE_BY}# $TMP_OUTPUT_FILE
done

echo "Remove M..."
sed -i 's#  M ##' ${TMP_OUTPUT_FILE}

echo "Remove A..."
sed -i 's#  A ##' ${TMP_OUTPUT_FILE}

#echo "Remove breaklines..."
#sed -i 's#^$##' ${TMP_OUTPUT_FILE}

echo "Remove lines with DELETE..."
sed -i '/ D /d' ${TMP_OUTPUT_FILE} 

echo "Remove lines with "packagejsp.sh"..."
sed -i '/packagejsp.sh/d' ${TMP_OUTPUT_FILE} 

echo "Remove lines starting with "Merging from"..."
sed -i '/^Merging from/d' ${TMP_OUTPUT_FILE} 

echo "Remove lines starting with "end of Merging from"..."
sed -i '/^end of Merging from/d' ${TMP_OUTPUT_FILE} 

echo "Content of the file..."
cat ${TMP_OUTPUT_FILE}

echo "Creation of the tars..."
tar cvf ${OUTPUT_ZIP} ${README_FILE}
tar cvf ${OUTPUT_ZIP_ROLLBACK} ${README_FILE}

echo "Creation of files..."
touch ${OUTPUT_ZIP}.error
touch ${OUTPUT_ZIP_ROLLBACK}.error

echo "We only want a file once.."
touch $UNIQUES
cat ${TMP_OUTPUT_FILE} | while read FILE
do
    grep "${FILE}$" $UNIQUES
    if [ "$?" != "0" ];then
        echo $FILE >> $UNIQUES
        echo "    TO ADD : $FILE"
    else
        echo "            ALREADY LISTED : $FILE"
    fi
done

echo "We only takes the first element of the line"
cut -f1 -d " " $UNIQUES > $FINAL

if [ ${PACKAGE_ROLLBACK} = "true" ];then
  echo ""
  echo "=== ROLLBACK ZIPPING : START... ==="
    echo "Updating former versions of the files ($REVISION) from SVN and adding them to the tar ${OUTPUT_ZIP_ROLLBACK}..."
    cat ${FINAL} | while read FILE
    do
        # Only ordinary files are treated. We don't want to zip a whole dir.
        if [ -f $FILE ]; then
            svn update $FILE -r $REVISION                    
            tar uvf $OUTPUT_ZIP_ROLLBACK $FILE --preserve-permissions --transform=s#./src/main/webapp/##
            if [ $? != 0 ]; then
                echo $FILE >> ${OUTPUT_ZIP_ROLLBACK}.error            
            fi        
        else
            echo "WARNING : $FILE not zipped because is a directory or not exists"
      echo "WARNING : $FILE not zipped because is a directory or not exists" >> ${OUTPUT_ZIP_ROLLBACK}.error        
        fi
    done
    echo "Compressing the tar..."
    echo "gzip ${OUTPUT_ZIP_ROLLBACK}"
    gzip ${OUTPUT_ZIP_ROLLBACK}
    echo "=== ROLLBACK ZIPPING ENDED ==="
    echo ""
fi

echo ""
echo "=== JSP PACKAGING : START... ==="
echo "Updating the files modifieds from SVN and adding them to the tar $OUTPUT_ZIP..."
cat ${FINAL} | while read FILE
do
    # Only ordinary files are treated. We don't want to zip a whole dir.
    echo "updating svn update `basename $FILE`..."
    svn update $FILE
    if [ -f $FILE ]; then        
        tar uvf $OUTPUT_ZIP $FILE --preserve-permissions --transform=s#./src/main/webapp/##         
        if [ $? != 0 ]; then
            echo $FILE >> ${OUTPUT_ZIP}.error            
        fi    
    else
        echo "WARNING : $FILE not zipped because is a directory or not exists"
        echo "        (to avoid zipping files inside that weren't modified)"
    echo "WARNING : $FILE not zipped because is a directory or not exists" >> ${OUTPUT_ZIP}.error
    fi
done
echo "Compressing the tar..."
echo "gzip ${OUTPUT_ZIP}"
gzip ${OUTPUT_ZIP}
echo "=== JSP ZIPPING ENDED ==="
echo ""

echo ""
echo "===================================================================="
echo "                     ERRORS REPORTS                                 "
echo "===================================================================="
echo ""

if [ ${PACKAGE_ROLLBACK} = "true" ];then
  echo ""
  echo "=== FILES FAILED DURING ROLLBACK ZIPPING : START ==="
  cat ${OUTPUT_ZIP_ROLLBACK}.error
  echo "=== FILES FAILED DURING ROLLBACK ZIPPING : END ==="
fi  

echo ""
echo "=== ERRORS DURING JSP ZIPPING : START ==="
cat ${OUTPUT_ZIP}.error
echo "=== ERRORS DURING JSP ZIPPING : END ==="