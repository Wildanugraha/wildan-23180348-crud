<?php
  include_once("const.php");
  

  function connectDB($config){	
    try {
      $host = $config["host"];
      $db = $config["db"];
      $username = $config["username"];
      $password = $config["password"]; 
      $conn = new PDO("mysql:host=$host;dbname=$db",  $username, $password);    
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      return $conn;	  
    } catch (PDOException $e) {
      echo "Connection failed: ".$e->getMessage();  
    }
  }

  function main_menu()
  {
     $config = array("host"=>"localhost",
                     "username"=>"root",
                     "password"=>"",
                     "db"=>"dagang");
     $conn = connectDB($config);
     $pages=(isset($_GET["pages"] ))? $_GET["pages"] : '';
      switch($pages){
		case "barang" :
          include_once(path."barang/view.php");
          break;
		case "add_barang" :  
		      include_once(path."barang/form.php");
          break;

    case "makanan" :
          include_once(path."makanan/view.php");
          break;
    case "add_makanan" :  
          include_once(path."makanan/form.php");
          break;  
	   
    case "minuman" :
          include_once(path."minuman/view.php");
          break;    
    case "add_minuman" :  
          include_once(path."minuman/form.php");
          break;

    case "perabotan" :
          include_once(path."perabotan/view.php");
          break;    
    case "add_perabotan" :  
          include_once(path."perabotan/form.php");
          break;

    case "sembako" :
          include_once(path."sembako/view.php");
          break;    
    case "add_sembako" :  
          include_once(path."sembako/form.php");
          break;
      
      }
  
  }
  
  function navigation(){
    $pages=(isset($_GET["pages"] ))? $_GET["pages"] : '';  
    $array_menu=array(array('file'=>'makanan',
                            'label'=>'Makanan'),
                      array('file'=>'barang',            
                            'label'=>'Barang'),
                      array('file'=>'perabotan',            
                            'label'=>'Perabotan'),
                      array('file'=>'sembako',            
                            'label'=>'Sembako'),
					            array('file'=>'minuman',
                            'label'=>'Minuman'));
						
    $menu='';
    foreach($array_menu as $row_menu){
      $css_act=(@$_GET["pages"]==$row_menu['file'])? 'id="submenu-active"' : '';
      $menu.='<li '.$css_act.' ><a href="index.php?pages='.$row_menu['file'].'"><i class="fa fa-circle-o"></i> '.$row_menu['label'].'</a>';
    }                      
    return $menu;
  }
  
?>