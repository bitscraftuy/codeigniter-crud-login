<div class="container">
    <div class="row"> 

    <div class="col-md-12">
        <h2><?php echo $title; ?></h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Title</strong></td>
                        <td><strong>Content</strong></td>
                        <td><strong>Action</strong></td>
                    </tr>
                <?php foreach ($news as $news_item): ?>
                        <tr>
                            <td><?php echo $news_item['title']; ?></td>
                            <td><?php echo $news_item['text']; ?></td>
                            <td>
                                <a class="btn btn-default" href="<?php echo site_url('news/'.$news_item['slug']); ?>">View</a> 
                                <a class="btn btn-default" href="<?php echo site_url('news/edit/'.$news_item['id']); ?>">Edit</a>
                                <a class="btn btn-danger" href="<?php echo site_url('news/delete/'.$news_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                            </td>
                        </tr>
                <?php endforeach; ?>

                </tbody>
               
            </table>    
        </div>
       
    </div>

        

</div>
</div>

