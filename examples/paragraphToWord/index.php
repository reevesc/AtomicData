<?php

require __DIR__ . '/../../vendor/autoload.php';
require_once 'Paragraph.php';
require_once 'Sentence.php';
require_once 'Word.php';

use ReevesC\examples\paragraphToWord\Paragraph;

$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.';

$article = new Paragraph(array(), $content);

?>

<html>
<head>
<style>
  body { width: 100%; }
  pre { font-size: 10px; white-space: pre-wrap; white-space: -moz-pre-wrap; white-space: -pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word; }
  .output-block { position: relative; width: 40%; }
  .left { float: left; }
</style>

</head>
<body>
  <h1>Example 1</h1>
  <h2>Paragraph to Word</h2>
  <p>A simple test that converts article style content into paragraphs (identified by line breaks), which are then broken down into sentences, and finally words.</p>
  <h3>Sample content:</h3>
  <pre><?= $content; ?></pre>
  <br>
  <hr>

  <div class="output-block left">
    <h3>Sample Object output:</h3>
    <pre style="font-size: 10px;"><?php print_r($article); ?></pre>
  </div>

  <div class="output-block left">
    <h3>And the sample content after it has been fused back together:</h3>
    <pre><?= $article->fuse(); ?></pre>
  </div>
</body>
</html>