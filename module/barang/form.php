 <!-- Content Header (Page header) -->
 <?php
 	if(isset($_GET['act'])=="edit"){
 		$stmt = $conn->prepare("SELECT * FROM barang WHERE kodebarang='".$_GET["ID"]."'");
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_OBJ);	
 	
		$kodebarang = $rows[0]->kodebarang;
 		$namabarang = $rows[0]->namabarang;
 		$hargabeli = $rows[0]->hargabeli;
 		$stok = $rows[0]->stok;
 		$hargajual = $rows[0]->hargajual;
		
 	}else{
 		$kodebarang = ""; 
 		$namabarang = "";
 		$hargabeli = "";
 		$stok = "";
 		$hargajual = "";
		
 	}
 ?>

    <!-- Main content -->
    <section class="content">
	 	
      <!-- Small boxes (Stat box) -->
		<div class="row">
		  <div class="col-md-12">
			<div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
					<form method="post" action="#">
              
			<section class="content-header">
				<h1>
					Barang
				</h1>      
			</section>
			  <div class="box-body">
                <div class="row form-group">
                      <div class="col col-md-10">


				<label for="kodebarang">Kode Barang</label>
                  <input type="text" class="form-control" name="kodebarang" placeholder="Enter Kode Barang" required="required" value="<?php echo $kodebarang;?>">
				  
                <label for="namabarang">Nama Barang</label>
                  <input type="text" class="form-control" name="namabarang" placeholder="Enter Nama Barang" required="required" value="<?php echo $namabarang;?>">

                <label for="hargabeli">Harga Beli</label>
                  <input type="text" class="form-control" name="hargabeli" placeholder="Enter Harga Beli" required="required" value="<?php echo $hargabeli;?>">

                <label for="stok">Stok</label>
                  <input type="text" class="form-control" name="stok" placeholder="Enter Stok" required="required" value="<?php echo $stok;?>">

                <label for="hargajual">Hrga Jual</label>
                  <input type="text" class="form-control" name="hargajual" placeholder="Enter Harga Jual" required="required" value="<?php echo $hargajual;?>">
			
			    	</div>
			  </div>
			<div class="box-footer">
				<button type="submit" name="btnSimpan" class="btn btn-primary">Masukan</button>
			</div>
				</div>
					</form>
      <!-- /.row -->
      <!-- Main row -->
	<?php
	  if(isset($_POST["btnSimpan"])):
		$a = $_POST["kodebarang"];
		$b = $_POST["namabarang"];
		$c = $_POST["hargabeli"];
		$d = $_POST["stok"];
		$e = $_POST["hargajual"];
		// validation
		if(empty($a)){
			echo "Kode jenis tidak boleh kosong";
			exit();
		}
		if(empty($b)){
			echo "Tidak boleh kosong";
			exit();
		}
		if(empty($c)){
			echo "Tidak boleh kosong";
			exit();
		}
		if(empty($d)){
			echo "Tidak boleh kosong";
			exit();
		}
		if(empty($e)){
			echo "Tidak boleh kosong";
			exit();
		}
		
		try {
			if(isset($_GET['act'])=="edit")
				$sql = "UPDATE barang SET kodebarang='$a', namabarang='$b', hargabeli='$c',stok='$d',hargajual='$e' WHERE kodebarang='".$_GET["ID"]."'";				
			else
				$sql = "INSERT INTO barang (kodebarang,namabarang,hargabeli,stok,hargajual) VALUES ('$a','$b','$c','$d','$e')";
				
			if ($conn->query($sql)) {
				echo "<script type= 'text/javascript'>alert('Data Berhasil Ditambahkan');
				      window.location.replace('index.php?pages=barang');
					 </script>";
			}else{
				echo "<script type= 'text/javascript'>alert('Data Gagal Ditambahkan');</script>";
			}
			$conn = null;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	  endif;	
	?>	
    </section>
    <!-- /.content -->