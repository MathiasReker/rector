<?php

namespace RectorPrefix20210606;

if (\class_exists('Tx_Extbase_Persistence_Exception_UnexpectedTypeException')) {
    return;
}
class Tx_Extbase_Persistence_Exception_UnexpectedTypeException
{
}
\class_alias('Tx_Extbase_Persistence_Exception_UnexpectedTypeException', 'Tx_Extbase_Persistence_Exception_UnexpectedTypeException', \false);
