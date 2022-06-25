<?php
/*
Creating a file:
fopen('file_name.extension', 'mode of file');   			here extexsion and mode to open a file is mandatory
 If there exist a file then fopen(); will open it otherwise it will create a new file and return an 'id'.

 Modes of file:
 'w(write a file)', 'r(read a file)', 'a(append on file(used to over-write a file))'

Closing a File:
		Syntx for closing a file 
fclose('file_id');
after writing or reading a file u must have to close it for security purpose.

Writing a file:

	syntx for writing a file

	fwrite('file_id', 'data you want to write goes here');
 you can also use '$int' or another variable of view the number of characters written on file.

 filesize("$file_name");	this function is used to display the total number of characters in file.

Reading a file:
fread(file_id', filesize($file_name)); || fread($file_name);


*/
 $filename = "mydata.txt";
$data = "This is Lenovo laptop";
$id = fopen($filename, 'a');
fwrite($id, "i7 3rd generation");
$read = fread($id,7);


?>