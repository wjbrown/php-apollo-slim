<script src="/js/jquery.scrollblur.js"></script>
<script src="/js/jquery.jscroll.js"></script>
<script src="/js/home.js"></script>

<?php foreach ($posts as $post) : ?>
<article class="archive-article">
    <div class="archive-article-meta">
        <div class="archive-article-thumbnail">
        <a href="/<?php echo $post['slug']; ?>"><img src="/img/<?php echo $post['thumbnail']; ?>" default="http://placehold.it/768x431" /></a>
        </div>
    
        <div class="archive-article-date">
            <span class="month-day"><?php echo date('F dS', strtotime($post['date'])); ?></span>
            <span class="year"><?php echo date('Y', strtotime($post['date'])); ?></span>
        </div>
    </div>
  
    <div class="archive-article-primary">
        <h3 class="archive-article-title">
            <a href="/<?php echo $post['slug']; ?>"><?php echo $post['title']; ?></a>
        </h3>
    
        <p><?php echo $post['summary']; ?></p>
    
        <p><a href="/<?php echo $post['slug']; ?>">Read more &rsaquo;</a></p>
    </div>
</article>
<?php endforeach; ?>

<?php if ($pagination['page'] < $pagination['last']) : ?>
<a href="/?page=<?php echo $pagination['page'] + 1; ?>" style="display:none" class="next">Next</a>
<?php endif; ?>
