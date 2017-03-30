
if [ $1 = "camera1" ]; then
	k=`shuf -i 1-6 -n 1`
	cat "image$k.txt"
else
	echo "<br><h1>no signal for $1</h1>"
fi
