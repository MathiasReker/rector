<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace RectorPrefix20210606\Symfony\Component\Finder\Iterator;

/**
 * FilecontentFilterIterator filters files by their contents using patterns (regexps or strings).
 *
 * @author Fabien Potencier  <fabien@symfony.com>
 * @author Włodzimierz Gajda <gajdaw@gajdaw.pl>
 */
class FilecontentFilterIterator extends \RectorPrefix20210606\Symfony\Component\Finder\Iterator\MultiplePcreFilterIterator
{
    /**
     * Filters the iterator values.
     *
     * @return bool true if the value should be kept, false otherwise
     */
    public function accept()
    {
        if (!$this->matchRegexps && !$this->noMatchRegexps) {
            return \true;
        }
        $fileinfo = $this->current();
        if ($fileinfo->isDir() || !$fileinfo->isReadable()) {
            return \false;
        }
        $content = $fileinfo->getContents();
        if (!$content) {
            return \false;
        }
        return $this->isAccepted($content);
    }
    /**
     * Converts string to regexp if necessary.
     *
     * @param string $str Pattern: string or regexp
     *
     * @return string regexp corresponding to a given string or regexp
     */
    protected function toRegex(string $str)
    {
        return $this->isRegex($str) ? $str : '/' . \preg_quote($str, '/') . '/';
    }
}
