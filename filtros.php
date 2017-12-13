<!-- filtros -->
				<div class= "row">
          <form class="col s12" action="pedirayuda.php" method="get" onSubmit="" enctype="multipart/form-data">
            <div class="input-field col s5">
                          <select id="categoria" name="categoria">
                              <?php
                                $provinciafiltro=$_GET['provincia'];
                                $categoriafiltro=$_GET['categoria'];
                                $query="SELECT * FROM avisos_categorias";
                                $result=mysqli_query($link, $query);
                                while($row = mysqli_fetch_object($result))
                                {
                                echo "<option value=" . $row->id_categoria . ">" . $row->descripcion . "</option>";
                                }
                              ?>
                          </select>
                          <label>Categoría</label>
                        </div>
                  <div class="input-field col s5">
                          <select id="provincia" name="provincia">
                              <?php
                              $provinciafiltro=$_GET['provincia'];
                                $id_usuario = $_SESSION['id'];
                                $query="SELECT p.nombre as provincia, p.id_provincia as idprovincia
                                        FROM usuarios as u join provincias as p on u.id_provincia_fk=p.id_provincia
                                        WHERE u.id_usuario='$id_usuario'";
                                $result=mysqli_query($link, $query);
                                $row = mysqli_fetch_object($result);
                                echo '<option value="' . $row->idprovincia . '" selected>' . $row->provincia . '</option>';
                             
                                $idprovincia = $_SESSION['provincia'];
                                $query="SELECT * 
                                        FROM provincias
                                        WHERE NOT id_provincia='$idprovincia'";
                                $result=mysqli_query($link, $query);
                                while($row = mysqli_fetch_object($result))
                                {
                                echo "<option value=" . $row->id_provincia . ">" . $row->nombre . "</option>";
                                }
                              ?>
                          </select>
                          <label>Provincia</label>
                      </div>
                        <!-- boton buscar -->
                        <div class="col s2">
                        <span class="badge"><button class="btn-floating btn-small waves-effect waves-light tooltipped" href="" data-tooltip="Filtrar Anuncios"><i class="material-icons">search</i></button></span>
                    	</div>
                    </div>		
                   </form>