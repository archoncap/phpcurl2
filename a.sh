

for i in {1..100};
do 
	echo "# phpcurl2_$i" >> README.md

done;
git init
git add README.md
git commit -m "first commit"
git remote add origin git@github.com:archoncap/phpcurl2.git
git push -u origin master


