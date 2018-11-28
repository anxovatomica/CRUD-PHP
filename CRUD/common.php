<style>
input[type=text], select, input[type=password], input[type=button] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<?php

session_start();

function escape($html)
{
	return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

/*	
	htmlspecialchars():Convert the predefined characters "<" (less than) and ">" (greater than) to HTML entities
	ENT_QUOTES - Encodes double and single quotes
	ENT_SUBSTITUTE - Replaces invalid encoding for a specified character 
	set with a Unicode Replacement Character U+FFFD (UTF-8) or &#FFFD; 
	instead of returning an empty string.
*/
?>