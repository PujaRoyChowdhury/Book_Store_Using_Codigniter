<!--This is book controller index view.-->
<!DOCTYPE html>
<html>
    <head>
        <title>Books Details</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body>
        <div class="container-fluid bg-dark  text-center shadow-sm">
            <div class="container pb-2 pt-2">
                <h1 class="text-white ">Books Store</h1>
            </div>
        </div>
        <div class="bg-white shadow-sm">
            <div class="container">
                <div class="row">
                    <nav class="nav nav-underline">
                        <div class="nav-link">Books / View</div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container  mt-4">
            <div class="row">
                <div class="col-md-12">
                    <?php if(!empty($session->getFlashdata('success'))) { ?>
                            <div class="alert alert-success">
                                <?php echo $session->getFlashdata('success')?>
                            </div>
                            <?php } ?>

                </div>
                <div class="col-md-12 text-right">
                    <a href="create" class="btn btn-success ">Add</a>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <div class="card-header-title">Books</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
            
                            <?php if(!empty($books))
                                {
                                    foreach($books as $book)
                                    {?>
                                       <tr>
                                           <td>  <?php echo $book['id'];  ?>  </td>
                                           <td>  <?php echo $book['title'];?>  </td>
                                           <td>  <?php echo $book['author'];?>  </td>
                                           <td>
                                              <a href="<?php echo base_url('book/edit/'.$book['id']);?>" class="btn btn-success">Edit</a>
                                              <a href="#" onclick="deleteConfirm(<?php echo $book['id']?>);" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                    <?php 
                                       } } ?><?phpelse { ?>
                                    
                                    <tr>
                                        <td class="colspan-5">Record not found</td>
                                    </tr>
                                <?php}?>
                            
                           
                         </table>
                     </div>
                   </div>
                </div>
            </div>
     </div>
</body>
</html>
<script>
    function deleteConfirm(id)
    {
        //alert(id);
        if(confirm("Are you sure want to delete the record?"))
        {
            //$this->load->helper('url');
            window.location.href='<?php echo base_url('book/delete/')?>/'+ id;
        }
    }
</script>
