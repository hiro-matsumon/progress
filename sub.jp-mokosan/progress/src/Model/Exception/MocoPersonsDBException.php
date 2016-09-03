<?php
/**
 * MocoPersons データベース例外
 * @author h.matsuda
 */
namespace App\Model\Exception;

use Cake\Core\Exception\Exception as CakeException;

/**
 * MocoPersons データベース例外
 * @package Model
 */
class MocoPersonsDBException extends CakeException
{
    public function __construct($message, $code = 500, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
