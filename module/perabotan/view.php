
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Perabotan</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <a href="?pages=add_perabotan"><font color="blue">Tambah Jenis Perabotan</font></a></button>
                                </div>
								<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
					<td><b>Kode Barang</b></td>
					<td><b>Nama Barang</b></td>	
					<td><b>Stok</b></td>
					<td><b>Harga Jual</b></td>					                                 
				    <td><b>ACTION</b></td>
                </tr>
               <?php
				$sql = "SELECT * FROM perabotan ORDER BY kodebarang ASC";
				$data = $conn->prepare($sql);
				$data->execute();
			
				while($row = $data->fetch(PDO::FETCH_OBJ)){
					$link_del = "index.php?pages=perabotan&act=delete&ID=$row->kodebarang";
						$link_edit = "index.php?pages=add_perabotan&act=edit&ID=$row->kodebarang";

            



					echo "<tr>
						<td>$row->kodebarang</td>
						<td>$row->namabarang</td>
            			<td>$row->stok</td>
            			<td>$row->hargajual</td>	
						<td>
							<a href='$link_edit' title='edit'><i class='zmdi zmdi-edit'><i class='fa fa-edit'></i></a>
							&nbsp;
							<a href='$link_del' title='delete'><i class='zmdi zmdi-delete'><i class='fa fa-close'></i></a>
						</td>
						</tr>";
				} 
				if(isset($_GET["act"])=="delete"):
					try {
						$sql = "DELETE FROM perabotan WHERE kodebarang='".$_GET["ID"]."'";
						  if ($conn->query($sql)) 
						  {
							echo "<script type= 'text/javascript'>alert('Data Berhasil Dihapus');
								  window.location.replace('index.php?pages=perabotan');
								 </script>";
						  }
						  else{
								echo "<script type= 'text/javascript'>alert('Data Gagal Dihapus');</script>";
						       }
						$conn = null;
					    }
					catch(PDOException $e){
						echo $e->getMessage();
					}
				endif;
					
				$conn = null; // close connection
				?>
              </table>
								</div>
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
            <!-- END MAIN CONTENT-->