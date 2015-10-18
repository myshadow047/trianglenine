<link href="<?php echo (file_exists('theme_url')) ? theme_url('css/error.css') : '' ?>" media="all" rel="stylesheet" type="text/css" />
<div class="error-container">
    <h1>A PHP Error was encountered</h1>
    <p>Severity: <?php echo (isset($exception)) ? get_class($exception) : $severity; ?></p>
    <p>Message:  <?php echo (isset($exception)) ? $exception->getMessage() : $message; ?></p>
    <p>Filename: <?php echo (isset($exception)) ? $exception->getFile() : $filepath; ?></p>
    <p>Line Number: <?php echo (isset($exception)) ? $exception->getLine() : $line; ?></p>
    <?php if (isset($exception)): ?>
    <pre><code><?php echo $exception->getTraceAsString() ?></code></pre>
    <?php endif ?>
</div>