
if test $1 ;then
	ok=$1
else
	ok="modified at:"`date +%Y%m%d_%H%M%S`
fi

git add . ;
git commit -m "$ok" ;
git push -u origin master;

