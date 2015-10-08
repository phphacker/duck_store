<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тег SELECT</title>
 </head>
 <body>  
 
  <form action="" method="post">
 <textarea style="height:8.8em;" name="text">
<?php 

if (isset($_POST["text"]))
	echo $_POST["text"];

?>
</textarea>
   <p><select style="height:8.8em;" size="3" name="func[]">
    <option disabled>Выберите функцию</option>
    <option selected value="word_count">Количество слов</option>
    <option value="word_even_count">Количество слов с четным количеством символов</option>
    <option value="word_up">Каждый второй символ в строке к верхнему регистру</option>    
    <option value="word_shuffle">Перемешать в каждом слове все символы кроме первого и последнего</option>
   </select></p>
   <p><input type="submit" value="Отправить"></p>
  </form>
  
  <textarea style="width:18.8em;">
  <?php 
  
  function space($var)
  {    
    return $var !== "";
  }
  
  function even($var)
  {    
    return strlen($var) % 2 == 0;
  }

  function word_count($text)
  {	  	  
	  return count(array_filter(explode(" ", $text), "space"));
  }
  
  function word_even_count($text)
  {	  	  
	  return count(array_filter(array_filter(explode(" ", $text), "space"), "even"));
  }
 
 function word_up($text)
  {	  	  
	  $arr = str_split($text);
	  for ($i=0; $i<count($arr);$i++)
	  {
		  if ($i % 2 == 0)
			  $arr[$i] = strtoupper($arr[$i]);		  
	  }	
	  return implode($arr);
  }

  function word_shuffle($text)
  {	  	  
		$arr = str_split($text);
		shuffle($arr);
		return implode($arr);
  }
	
	switch ($_POST["func"][0])
	{
		case "word_count":  echo isset($_POST["text"]) ? word_count($_POST["text"]) : 0; break;
		case "word_even_count":  echo isset($_POST["text"]) ? word_even_count($_POST["text"]) : 0; break;
		case "word_up":  echo isset($_POST["text"]) ? word_up($_POST["text"]) : 0; break;
		case "word_shuffle":  echo isset($_POST["text"]) ? word_shuffle($_POST["text"]) : 0; break;
	} 
  
  ?>
  </textarea>

 </body>
</html>
