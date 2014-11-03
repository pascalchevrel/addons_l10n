<?php

function jsonOutput(array $data, $jsonp = false)
{
    $json = json_encode($data);
    $mime = 'application/json';

    if ($jsonp && is_string($jsonp)) {
        $mime = 'application/javascript';
        $json = $jsonp . '(' . $json . ')';
    }

    ob_start();
    header("access-control-allow-origin: *");
    header("Content-type: {$mime}; charset=UTF-8");
    echo $json;
    $json = ob_get_contents();
    ob_end_clean();
    return $json;
}


function fileForceContents($dir, $contents)
{
    $parts = explode('/', $dir);
    $file = array_pop($parts);
    $dir = '';

    foreach ($parts as $part) {
        if (!is_dir($dir .= "/$part")) {
            mkdir($dir);
        }
    }

    file_put_contents("$dir/$file", $contents);
}

/*
 *  SAPI file (lang_update)
 */
function logger($str, $action='')
{
    error_log($str);
    if ($action == 'quit') {
        die;
    }
}

function updateInstallRdf($path, $needle, $content)
{
    $path = $path . '/install.rdf';
    $install_rdf = file_get_contents($path);

    // remove Windows line endings to avoid mixed line endings
    $install_rdf = str_replace("\r", '', $install_rdf);

    $install_rdf = preg_replace('#\s*<em\:localized>(.*?)<\/em\:localized>#s', '', $install_rdf);

    $install_rdf = str_replace(
        $needle,
        $needle . $content,
        $install_rdf
    );

    fileForceContents($path, $install_rdf);
}

function normalizeLine($line) {
    $line = explode(' ', $line);
    $line = array_filter($line); // suppress blanks
    $line = array_values($line); // reindex array
    $line[0] = str_pad($line[0], 12);
    $line[2] = str_pad($line[2], 12);
    $line = trim(implode('  ', $line));

    return $line;
}

function updateManifestWithLocale($path, $extension, $locale)
{
    $manifest = $path .'/chrome.manifest';
    $lines = \l10n\Dotlang::fileToArray($manifest);
    $lines[] = "locale $extension $locale locale/$locale/";
    $lines = array_map('normalizeLine', $lines);
    $lines = array_unique($lines);
    sort($lines);

    return file_put_contents($manifest, implode("\n", $lines) . "\n");
}

function showExec($command, $message)
{
    exec($command, $output);
    return "--- {$message} ---\n" . implode("\n", $output) . "\n";
}
