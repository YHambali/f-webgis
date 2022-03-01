<?php 
header('Content-type: application/xml; charset="ISO-8859-1"',true);  
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
     <loc><?php echo base_url('');?></loc>
     <priority>1.0</priority>
  </url>

  <url>
   <loc><?php echo base_url('').'contact';?></loc>
   <priority>0.9</priority>
  </url> 

  <url>
   <loc><?php echo base_url('').'#faq';?></loc>
   <priority>0.8</priority>
  </url> 

  <?php foreach($product as $s) { ?>
  <url>
     <loc><?php echo base_url().'product-detail/'.$s['slug'].''?></loc>
     <priority>0.7</priority>
   </url>
  <?php } ?>
  
  <?php foreach($blog as $s) { ?>
  <url>
     <loc><?php echo base_url().'blog-detail/'.$s['slug'].''?></loc>
     <priority>0.6</priority>
   </url>
  <?php } ?>

  <url>
   <loc><?php echo base_url('').'blog';?></loc>
   <priority>0.5</priority>
  </url> 

   <url>
   <loc><?php echo base_url('').'portfolio';?></loc>
   <priority>0.4</priority>
  </url>
  
  <?php foreach($portfolio as $s) { ?>
  <url>
     <loc><?php echo base_url().'portfolio-detail/'.$s['slug'].''?></loc>
     <priority>0.3</priority>
   </url>
  <?php } ?>

  

</urlset>