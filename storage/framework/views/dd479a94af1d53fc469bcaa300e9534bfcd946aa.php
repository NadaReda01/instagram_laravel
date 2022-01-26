<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>posts</h1>
            <br>

           
            <br>
             <?php echo e(session()->get('Message')); ?>



        </div>

        

        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <th>ID</th>
                <th>caption</th>
                <th>Image</th>
                <th>user_id</th>
                
            </tr>

         <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $raw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>

                <td><?php echo e($raw->id); ?></td>
                <td><?php echo e($raw->caption); ?></td>
                <td> <?php if(!empty($raw->image)): ?> <img src="<?php echo e(url('/images/'.$raw->image)); ?>" alt="" width="50px" height="50px"> <?php else: ?> <?php echo e('No Image'); ?> <?php endif; ?> </td>
                <td><?php echo e($raw->UserName); ?></td>

                <td>




                    <a href='' data-toggle="modal" data-target="#modal_single_del<?php echo e($key); ?>" class='btn btn-danger m-r-1em'>Remove </a>


                    <a href='<?php echo e(url('/editpost/'.$raw->id.'/edit')); ?>' class='btn btn-primary m-r-1em'>Edit</a>
                </td>
            </tr>



            <div class="modal" id="modal_single_del<?php echo e($key); ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">delete confirmation</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                                 </button>
                                  </div>

                                  <div class="modal-body">
                                    Remove  <?php echo e($raw->caption); ?> !!!!
                                  </div>
                                  <div class="modal-footer">
                                      <form action="<?php echo e(url('/create/'.$raw->id)); ?>" method="post">

                                          <?php echo csrf_field(); ?>

                                          <?php echo method_field('delete'); ?>

                                          <div class="not-empty-record">
                                              <button type="submit" class="btn btn-primary">Delete</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>



         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
        </table>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

</body>

</html><?php /**PATH C:\xampp\htdocs\new8\resources\views/postindex.blade.php ENDPATH**/ ?>