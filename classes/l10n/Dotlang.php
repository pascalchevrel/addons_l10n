<?php
namespace l10n;

class Dotlang
{
    public $strings   = [];
    public $comments  = [];
    public $files     = [];
    public $meta_data = [];
    public $source_lang;

    public function __construct($source = 'en-US')
    {
        $this->source_lang = $source;
    }

    public function resetData()
    {
        $this->strings   = [];
        $this->comments  = [];
        $this->files     = [];
        $this->meta_data = [];
    }

    public function summary()
    {
        $summary = [
            'source'    => $this->strings,
            'files'     => $this->files,
            'meta_data' => $this->meta_data,
            'strings'   => $this->strings,
        ];

        return $summary;
    }

    /*
       Reads in a file of strings into a global array.  File format is:
        ;String in english
        translated string

        ;Another string
        another translated string
     */
    public function load($file)
    {
        $this->files[] = $file;

        $f = $this->fileToArray($file);

        for ($i = 0, $lines = count($f); $i < $lines; $i++) {
            // First line may contain an activation status
            // Tags are read with regexp "^## (\w+) ##", so trailing spaces can be ignored
            if ($i == 0 && rtrim($f[0]) == '## active ##') {
                $this->meta_data[$file]['activated'] = true;
                continue;
            }

            // Get file description
            if ($this->startsWith($f[$i], '## NOTE:')) {
                $this->meta_data[$file]['filedescription'] = trim(substr($f[$i], 8));
                continue;
            }

            // Other tags (promos)
            if ($this->startsWith($f[$i], '##')) {
                $GLOBALS[$array_name]['tags'][] = trim(str_replace('##', '', $f[$i]));
                continue;
            }

            if ($this->startsWith($f[$i], ';') && ! empty($f[$i+1])) {

                $english = trim(substr($f[$i], 1));
                $translation = trim($f[$i+1]);
                $this->comments[$english] = '';

                if ($this->startsWith($translation, ';') || $this->startsWith($translation, '#')) {
                    /* Empty translation: what I'm reading as translation is either the next reference string
                    or the next comment. I'll consider the string untranslated.*/
                    $translation = $english;
                } else {

                    if ($i >= 2) {

                        if ($this->startsWith($f[$i-1], '#') && !$this->startsWith($f[$i-1], '##')) {
                            $this->comments[$english] .= trim(substr($f[$i-1], 1));
                        }

                    }
                }

                $this->strings[$english] = $translation;

                $i++;
            }
        }
    }

    /*
     * Check if $haystack starts with the $needle string
     *
     * @param  string $string string we analyse
     * @param  string $needle string we look for at the beginning
     * @return boolean
     */
    public static function startsWith($string, $needle)
    {
        return !strncmp($string, $needle, strlen($needle));
    }

    public function getString($source)
    {
        if (array_key_exists($source, $this->strings)) {
            $translation = $this->cleanString($this->strings[$source]);
        }

        return isset($translation) ? $translation : $source;
    }

    public function getStringNoHTML($source)
    {
        $string = $this->getString($source);
        $string = str_replace(['&nbsp;'], [' '], $string);
        $string = strip_tags($string);

        return $string;
    }

    public function getStringPreNoHTML($source)
    {
        $string = $this->getString($source);

        return strstr($string, '<a>', true);
    }

    public function getStringLinkNoHTML($source)
    {
        $string = $this->getString($source);
        preg_match("/<a>(.*?)<\/a>/", $string, $matches);

        return $matches[1];
    }

    public function getStringPostNoHTML($source)
    {
        $string = $this->getString($source);

        return substr(strstr($string, '</a>'), strlen('</a>'));
    }

    public function cleanString($string)
    {
        return trim(str_replace('{ok}', '', $string));
    }

    /*
     * Loads the file and returns a cleaned up array of the lines
     */
    public static function fileToArray($file)
    {
        if (! is_file($file)) {
            error_log($file . ' does not exist!');

            return false;
        }

        $file = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (count($file) > 0) {
            // remove BOM
            $file[0] = trim($file[0], "\xEF\xBB\xBF");
        }

        return $file;
    }

    public function fileTranslated()
    {
        $source       = array_keys($this->strings);
        $translations = array_values($this->strings);
        $nb_todo      = count($this->strings);
        $nb_done      = count(array_diff($source, $translations));

        return ($nb_todo - $nb_done) == 0;
    }

}
