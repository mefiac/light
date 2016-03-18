<?php
class polindrom {
	public $str;
	public $reverse;
	
   public function __construct($str)
   {	
	  $this->str=preg_replace('/\s/', '', $str);   //пробелы не нужны.  
	  $str= iconv('utf-8', 'utf-16le', $this->str); //для реверса нужно перевести в двухбайтовую кодировку
	  $this->reverse=iconv('utf-16be', 'utf-8', strrev( $str));
   }
   private function hardcheck()
   {
	   $len=strlen($this->str);
	   $buff=null;
	   $results=[];
	   for($i=0;$i<$len;$i++) 
	   {
		 
		   if(strcmp($this->str[$i],$this->reverse[$i])==0)
		   {
			  $buff=$buff.$this->str[$i];
			  
		   }else 
		   {
		 
			 strlen($buff)<3 ? null : array_push($results, $buff); //пишем в массив результатов
			     
		   }
		   
	   } 
	  if($results!=null)
	  {
		  $mess=null;
		  
		  foreach($results as $resulst)
		  {
			   strlen($resulst)>strlen($mess) ? $mess=$resulst : null ; //надо определить длиннейшее
		  }
		  return $mess; 
		  
	  } else return $this->str[0]; //если вообще не нашло полиндром массив $result будет пуст
   }
   public function check()
   {
	  if(strcmp($this->str,$this->reverse)==0) return $this->str;   //если уже равны то нечего мучаться
	  return $this->hardcheck();
	 
	 
	   
   }
}

$str='Sim sum аргентина манит негра mus qus';

$a=new polindrom($str);
echo $a->check();
