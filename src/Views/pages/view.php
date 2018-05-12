<article class="archive-article full">
    <h3 class="archive-article-title"><?php echo $post['title']; ?></h3>

    <div class="archive-article-meta">
        <div class="archive-article-date">
            <span class="month-day"><?php echo date('F dS', strtotime($post['date'])); ?></span>
            <span class="year"><?php echo date('Y', strtotime($post['date'])); ?></span>
        </div>
        
        <div class="archive-article-thumbnail">
            <img src="/img/<?php echo $post['image']; ?>" default="http://placehold.it/1100x618" />
        </div>
    </div>

    <div class="archive-article-primary">
        <?php echo $post['body']; ?>

        <p><a href="/">&lsaquo; Go back</a></p>
    </div>
</article>