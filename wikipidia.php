<?php
// load Zend classes
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Rest_Client');

// load wikitext converter
require_once 'Text/Wiki.php';

// instantiate a Text_Wiki object from the given class
// and set it to use the Mediawiki adapter
$wiki = & Text_Wiki::factory('Mediawiki');

// set some rendering rules  
$wiki->setRenderConf('xhtml', 'wikilink', 'view_url', 
  'http://en.wikipedia.org/wiki/');
$wiki->setRenderConf('xhtml', 'wikilink', 'pages', false);
  
// define page title
$query = 'The A Team';

try {
  // initialize REST client
  $wikipedia = new Zend_Rest_Client('http://en.wikipedia.org/w/api.php');

  // set query parameters
  $wikipedia->action('query');
  $wikipedia->prop('revisions');
  $wikipedia->rvprop('content');
  $wikipedia->format('xml');
  $wikipedia->redirects('1');
  $wikipedia->titles($query);

  // perform request
  // get page content as XML
  $result = $wikipedia->get();
  $content = $result->query->pages->page->revisions->rev;
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}
?>
<html>
  <head>
  </head>
  <body>
    <h2>Page result for '<?php echo $query; ?>'</h2>
    <div>
      <?php echo $wiki->transform($content, 'Xhtml'); ?>
      </script>
    </div>
  </body>
</html>