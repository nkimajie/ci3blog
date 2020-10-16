<div class="container">
    <div class="row">
       <div class="col">
           <div class="card m-5">
                   <div class="card-header">
                       <h2 class="text-center text-dark">All Post</h2>
                    <?php if(isset($_GET['deleted'])): ?>
                        <div class="alert alert-danger" role="alert">Post Deleted</div>
                    <?php endif; ?>
                   </div>
                   
                   <div class="card-body">
                       <table class="table table-bordered">
                           
                           <thead>
                               <tr>
                                   <td>ID</td>
                                   <td>Title</td>
                                   <td>Body</td>
                                   <td>Created On</td>
                                   <td>Edit</td>
                                   <td>Delete</td>
                               </tr>
                               
                               
                           </thead>
                           <tbody>
                               <?php $i = 1; foreach ($post as $s) { ?>
                                <?php $text = word_limiter($s['body'], 10) ?>
                           <tr>   
                                <td><?= $i++ ; ?></td>
                                <td><?= $s['title']; ?></td>
                                <td><?= $text; ?></td>
                                <td><?= $s['created_at'] ?></td>
                                <td><a href="<?= base_url('/posts/Edit/') ?><?= $s['slug']; ?>" class="btn btn-success">Edit</a></td>
                                <td><a href="<?= base_url('/posts/Delete/') ?><?= $s['id']; ?>" class="btn btn-danger">Delete</a></td>
                               </tr>
                               <?php
                                   }
                                   ?>
                           </tbody>
                       </table>
                   </div>
           </div>
       </div>
    </div>
</div>