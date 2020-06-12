<?php
class Dbo
{
	  public $CanCount,$Dbo_Array;
	  private $Dbo_Localhost,$Dbo_User,$Dbo_Pwd,$Conn,$mDbName,$Dbo_Rst;
	  public function Dbo($SQL,$ShowCount)
	  {
	  $this->CanCount=0;
	  $this->Dbo_Array=array();
	  $this->Dbo_Localhost="rm-2ze7330anj61428oj.mysql.rds.aliyuncs.com";
	  $this->Dbo_User="canyinyunfu";
	  $this->Dbo_Pwd=" h4eGcJkJhOrj9AEy";
	  $this->Conn="";
	  $this->mDbName="demo";
	  $this->Dbo_Rst="";
	  $this->OpenDB();
	  $this->RunSQL($SQL);
		  if($ShowCount!=0)
		  {
		  $this->LoadInfo($ShowCount);
		  }
	  }
	  private function OpenDB()
	  {
	  $this->Conn=mysql_connect($this->Dbo_Localhost,$this->Dbo_User,$this->Dbo_Pwd) or die("连接服务器失败".mysql_error());
	  mysql_select_db($this->mDbName,$this->Conn);
	  mysql_query("set names utf8",$this->Conn);
	  }
	  private function RunSQL($SQL)
	  {
	  $this->Dbo_Rst=mysql_query($SQL,$this->Conn) or die("执行SQL语句出错".mysql_error());
	  }
	  private function LoadInfo($ShowCount)
	  {
	      while($temp=mysql_fetch_row($this->Dbo_Rst))
		  {
		     for($Dbo_j=0;$Dbo_j<$ShowCount;$Dbo_j++)
			 {
			 $this->Dbo_Array[$this->CanCount][$Dbo_j]=$temp[$Dbo_j];
			 }
			 $this->CanCount++;
		  }
		  mysql_free_result($this->Dbo_Rst);
		  mysql_close($this->Conn);
	  }

}
?>
