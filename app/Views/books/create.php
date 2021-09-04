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
                <div class="col-md-12 text-right">
                    <a href="index" class="btn btn-success ">Back</a>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <div class="card-header-title">Create Books</div>
                    </div>
                    <div class="card-body">
                        <form name="createForm" id="createForm" method="post">
                            <div class="form-group">
                                <lable for="name">Name</lable>
                                <input type="text" name="name" id="name" class="form-control <?php echo (isset($validation) && $validation->hasError('name'))?'is-invalid' : ''; ?>" placeholder="Enter the book name" value="<?php echo set_value('name');?>"/>
                                <?php
                                   if(isset($validation) && $validation->hasError('name'))
                                   {
                                       echo '<p class="invalid-feedback">' . $validation->getError('name').'</p>';
                                   } 
                                ?>
                            </div>
                            <div class="form-group">
                                <lable for="author">Author</lable>
                                <input type="text" name="author" id="author" class="form-control <?php echo (isset($validation) && $validation->hasError('author'))?'is-invalid' : ''; ?>" placeholder="Enter the author name" value="<?php echo set_value('author');?>"/>
                                <?php
                                   if(isset($validation) && $validation->hasError('author'))
                                   {
                                       echo '<p class="invalid-feedback">' . $validation->getError('author').'</p>';
                                   } 
                                ?>
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                     </form>    
                    </div>
                   </div>
                </div>
            </div>
        </div>
</body>
</html>
