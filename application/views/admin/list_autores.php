<script type="text/javascript">
  
  function delete_author( id)
  {
    var ok = confirm( "¿ Seguro de borrar este autor ? ");
    if ( !ok)
    {
      return false;
    }
    else
    {
      location.href = "/delete_author/" + id;
    }
  }

</script>


<div class="container">
    <div class="row">
      <div class="col-lg-12 text-lett">
        <h1 class="mt-5">Listado de posts</h1>
        </ul>
      </div>
    </div>
    <br><br>
    
    <div class="row">
      <div class="col-lg-12 text-center">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">email</th>
              <th scope="col">Activo</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody>

            <?php

                foreach ( $authors as $autor) 
                {
                  if ( $autor['enabled'] == "1")
                  {
                    $enabled = "<img src='/images/activo.png'  width=20px>";
                  }
                  else
                  {
                    $enabled = "<img src='/images/no_activo.png' width=20px>";
                  }


                  echo '<tr>
                    <th scope="row">'.$autor['id'].'</th>
                    <td align=left>'.$autor['display_name'].'</td>
                    <td  align=left>'.$autor['email'].'</td>
                    <td>'.$enabled.'</td>
                    <td><a href="edit_autor/'.$autor['id'].'"><img src="/images/edit.png" width=20px></a></td>
                    <td><a href="#" OnClick="delete_author('.$autor['id'].')"><img src="/images/delete_2.png"  width=20px></a></td>
                  </tr>';

                }

            ?>
            
            
          </tbody>
        </table>

      </div>
    </div>

  </div>
