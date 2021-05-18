<?php

declare (strict_types=1);
namespace RectorPrefix20210518\Helmich\TypoScriptParser\Tokenizer\Printer;

use RectorPrefix20210518\Helmich\TypoScriptParser\Tokenizer\TokenInterface;
use RectorPrefix20210518\Symfony\Component\Yaml\Yaml;
class StructuredTokenPrinter implements \RectorPrefix20210518\Helmich\TypoScriptParser\Tokenizer\Printer\TokenPrinterInterface
{
    /** @var Yaml */
    private $yaml;
    public function __construct(\RectorPrefix20210518\Symfony\Component\Yaml\Yaml $yaml = null)
    {
        $this->yaml = $yaml ?: new \RectorPrefix20210518\Symfony\Component\Yaml\Yaml();
    }
    /**
     * @param TokenInterface[] $tokens
     * @return string
     */
    public function printTokenStream(array $tokens) : string
    {
        $content = '';
        foreach ($tokens as $token) {
            $content .= \sprintf("%20s %s\n", $token->getType(), $this->yaml->dump($token->getValue()));
        }
        return $content;
    }
}
