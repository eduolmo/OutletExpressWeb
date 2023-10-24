<?php
include 'banco.php';
    $sql = "SELECT * FROM PRODUTO";
    $resultado = mysqli_query($connect,$sql);

    if (mysqli_num_rows($resultado)>0):   
        while($linha =mysqli_fetch_array($resultado)):

?>

<tr>
    <td> <?php echo $linha['nome']; ?> </td>
    <td> <?php echo $linha['email']; ?> </td>
    <td> <?php echo $linha['senha']; ?> </td>
    <td> <?php echo $linha['codigo']; ?>  </td>                            
    <td>    
        <a href='editar.php?id=<?php echo $linha['id'];?>'  class="btn btn-sm btn-primary"> 
            <i  class="bi bi-pencil"></i>
        </a>
        
        <!-- O atributo  data-bs-toggle pode ser modal ou popover. -->
        <a href='excluir.php?id=<?php echo $linha['id'];?>' class="btn btn-sm btn-danger"  data-bs-toggle='modal' data-bs-target="#exampleModal<?php echo $linha['id'];?>"> 
            <i class="bi bi-trash-fill"></i>
        </a>                              
    </td>
</tr>

<?php 
        endwhile; 
    else:
?>
    <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
    </tr>
<?php
endif;
?>     