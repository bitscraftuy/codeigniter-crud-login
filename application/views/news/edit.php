<div class="container">
    <div class="row"> 

        <div class="col-md-12">


                <h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open('news/edit/'.$news_item['id']); ?>

                <div class="input-group">
                    <input class="form-control" placeholder="Title" type="input" value="<?php echo $news_item['title'] ?>" name="title" size="50" />
                </div>
                <div class="input-group">
                     <textarea class="form-control" placeholder="Description" name="text" rows="10" cols="40"><?php echo $news_item['text'] ?></textarea>
                    
                </div>
                <div class="input-group">
                    <input class="btn btn-default" type="submit" name="submit" value="Edit news item" />
                </div>
                    
                </form>

        </div>

    </div>
</div>
