<?php
// include('connection.php');
include('header.php');
?>


<style>
    table {
        border:1px solid #000;
        
    }
    table  th{
        border:1px solid #000;
        text-align:center;
        padding:10px;
    }
    table td {
        border:1px solid #000;
        padding:10px;
    }
</style>

<section id="page-content-wrap">
            <div class="gallery-page-wrap section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 m-auto">
                            <h5 class="text-center" style="text-transform:uppercase;font-weight:600; padding:15px;">  Flash Messages List </h5>
                           <table >
                                <tbody>
                                    <tr>
                                    <th>
                                            S.NO
                                    </th>
                                        <th>
                                            Flash News
                                        </th>
                                        
                                    </tr>
                                    <?php 
        $result = mysqli_query($db, "SELECT * FROM tb_news Where status = '1' ORDER BY style_id");
        $counter = 1;

        $i=1; 
        while($row = mysqli_fetch_array($result))
        {
            $dec=$row["desce"];
                    ?> 
                                    <tr>
                              
                                    <td>
            <?php echo  $counter; ?>
        </td>

      
                                         
         
                                            <td>
        
        <?php echo $dec;?>

      
                                            </td>
                                            
                                    </tr>
                                    <?php
                                    $counter++;
                                 } ?>
                                </tbody>
                           </table>

                           
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php
include('footer.php');
?>