<?php

/* Generate a basic RSS feed (post titles only) for https://github.com/cadars/portable.php
- Add <link rel="alternate" type="application/rss+xml" href="feed.xml"> to the <head> of portable.php
- `bash portable.sh` to generate both index.html and feed.xml */

$site_title = 'This is the website title';
$site_desc = 'This is the website description';
$site_url = 'http://example.com';

function create_slug($string){
  $string = strtolower($string);
  $string = strip_tags($string);
  $string = stripslashes($string);
  $string = html_entity_decode($string);
  $string = str_replace('\'', '', $string);
  $string = trim(preg_replace('/[^a-z0-9]+/', '-', $string), '-');
  return $string;
}

$files = [];
foreach (new DirectoryIterator(__DIR__.'/content/') as $file) {
  if ( $file->getType() == 'file' && strpos($file->getFilename(),'.md') ) {
    $files[] = $file->getFilename();
  }
}
rsort($files);

foreach ($files as $file) {

  $filename_no_ext = substr($file, 0, strrpos($file, "."));    
  $date = date("r", strtotime($filename_no_ext));
  $file_path = __DIR__.'/content/'.$file;
  $file = fopen($file_path, 'r');
  $post_title = trim(fgets($file),'#');
  $post_slug = create_slug($filename_no_ext.$post_title);
  fclose($file);
  
  $items .= '<item>
    <title>'.$post_title.'</title>
    <pubDate>'.$date.'</pubDate>
    <link>'.$site_url.'/#'.$post_slug.'</link>
    <guid>'.$site_url.'/#'.$post_slug.'</guid>
    <description></description>
    </item>';
}
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title><?php echo $site_title; ?></title>
    <description><?php echo $site_desc; ?></description>
    <language>en-us</language>
    <link><?php echo $site_url; ?></link>
    <atom:link href="<?php echo $site_url; ?>/feed.xml" rel="self" type="application/rss+xml" />
    <?php echo $items; ?>
    
  </channel>
</rss>