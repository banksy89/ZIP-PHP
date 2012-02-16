<h1>Compress a Directory into a ZIP using PHP</h1>

<p>zip.php holds the zipping function. To use: </p>

<p><code>$result = zipper ( $_SERVER['DOCUMENT_ROOT'] . '/your/file/path', array ( 'ignore.html' ), 'Zipper.zip', TRUE );</code></p>

<hr>

<p>So to use there is just one line to call with a few parameters. In this order:  </p>

<ol>
  <li>Path to the directory - I have put the document root there, just need to assign the exact 
  location of the Directory you want to compress</li>
  <li>Ignore Array - put any files you wish to be ignored and not compressed.</li>
  <li>The Archive name - call this whatever you want and end it in .zip</li>
  <li>Overwrite - Set this to TRUE or FALSE depending if you want to overwrite an existing archive or not.</li>
</ol>

<p>So that's it, you can choose to ignore specific files and just provide a directory to with files in the compress. Quite simple
to extend this way and add functionality, but this is the simplest of forms to actually create the ZIP file. </p>
<p>The function returns a BOOLEAN so you can do a condition depending on the call back TRUE/FALSE.</p>

