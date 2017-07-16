<?php
/**
 * Abstract entity class
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Model;

/**
 * Class AbstractEntity
 *
 * @package Games\Model
 */
abstract class AbstractEntity
{
    /**
     * Hydrate the object
     *
     * @param array $value is the POST array
     *
     * @return null
     */
    public function hydrate($value = [])
    {
        foreach ($value as $theField => $fieldValue) {
            if (property_exists($this, $theField)) {
                $this->$theField = $fieldValue;
            }
        }

        return null;
    }

    /**
     * Validate the object
     *
     * @param boolean $validateId validate the id field too
     *
     * @return mixed
     */
    abstract public function validate($validateId = false);
}
