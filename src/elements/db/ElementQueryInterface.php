<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\elements\db;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use craft\base\ElementInterface;
use craft\models\Site;
use yii\base\Arrayable;
use yii\db\Connection;
use yii\db\QueryInterface;


/**
 * ElementQueryInterface defines the common interface to be implemented by element query classes.
 *
 * The default implementation of this interface is provided by [[ElementQuery]].
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
interface ElementQueryInterface extends QueryInterface, ArrayAccess, Arrayable, Countable, IteratorAggregate
{
    /**
     * Sets the [[asArray]] property.
     *
     * @param bool $value The property value (defaults to true)
     *
     * @return static self reference
     */
    public function asArray($value = true);

    /**
     * Sets the [[id]] property.
     *
     * @param mixed $value The property value
     *
     * @return static self reference
     */
    public function id($value);

    /**
     * Sets the [[uid]] property.
     *
     * @param mixed $value The property value
     *
     * @return static self reference
     */
    public function uid($value);

    /**
     * Sets the [[fixedOrder]] property.
     *
     * @param bool $value The property value (defaults to true)
     *
     * @return static self reference
     */
    public function fixedOrder($value = true);

    /**
     * Sets the [[status]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return static self reference
     */
    public function status($value);

    /**
     * Sets the [[archived]] property.
     *
     * @param bool $value The property value (defaults to true)
     *
     * @return static self reference
     */
    public function archived($value = true);

    /**
     * Sets the [[dateCreated]] property.
     *
     * @param mixed $value The property value
     *
     * @return static self reference
     */
    public function dateCreated($value = true);

    /**
     * Sets the [[dateUpdated]] property.
     *
     * @param mixed $value The property value
     *
     * @return static self reference
     */
    public function dateUpdated($value = true);

    /**
     * Sets the [[siteId]] property based on a given site(s)’s handle.
     *
     * @param string|Site $value The property value
     *
     * @return static self reference
     */
    public function site($value);

    /**
     * Sets the [[siteId]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function siteId($value);

    /**
     * Sets the [[enabledForSite]] property.
     *
     * @param mixed $value The property value (defaults to true)
     *
     * @return static self reference
     */
    public function enabledForSite($value = true);

    /**
     * Sets the [[relatedTo]] property.
     *
     * @param int|array|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function relatedTo($value);

    /**
     * Sets the [[title]] property.
     *
     * @param string $value The property value
     *
     * @return static self reference
     */
    public function title($value);

    /**
     * Sets the [[slug]] property.
     *
     * @param string $value The property value
     *
     * @return static self reference
     */
    public function slug($value);

    /**
     * Sets the [[uri]] property.
     *
     * @param string $value The property value
     *
     * @return static self reference
     */
    public function uri($value);

    /**
     * Sets the [[search]] property.
     *
     * @param string $value The property value
     *
     * @return static self reference
     */
    public function search($value);

    /**
     * Sets the [[ref]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return static self reference
     */
    public function ref($value);

    /**
     * Sets the [[with]] property.
     *
     * @param string|string[] $value The property value
     *
     * @return self The query object itself
     */
    public function with($value);

    /**
     * Sets the [[structureId]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function structureId($value);

    /**
     * Sets the [[level]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function level($value);

    /**
     * Sets the [[ancestorOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function ancestorOf($value);

    /**
     * Sets the [[ancestorDist]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function ancestorDist($value);

    /**
     * Sets the [[descendantOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function descendantOf($value);

    /**
     * Sets the [[descendantDist]] property.
     *
     * @param int $value The property value
     *
     * @return static self reference
     */
    public function descendantDist($value);

    /**
     * Sets the [[siblingOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function siblingOf($value);

    /**
     * Sets the [[prevSiblingOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function prevSiblingOf($value);

    /**
     * Sets the [[nextSiblingOf]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function nextSiblingOf($value);

    /**
     * Sets the [[positionedBefore]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function positionedBefore($value);

    /**
     * Sets the [[positionedAfter]] property.
     *
     * @param int|ElementInterface $value The property value
     *
     * @return static self reference
     */
    public function positionedAfter($value);

    // Query preparation/execution
    // -------------------------------------------------------------------------

    /**
     * Executes the query and returns all results as an array.
     *
     * @param Connection $db The database connection used to generate the SQL statement.
     *                       If this parameter is not given, the `db` application component will be used.
     *
     * @return ElementInterface[] The resulting elements.
     */
    public function all($db = null);

    /**
     * @inheritdoc
     *
     * @return ElementInterface|null The resulting element.
     */
    public function one($db = null);

    /**
     * @inheritdoc
     *
     * @return ElementInterface|null The resulting element.
     */
    public function nth($n, $db = null);

    /**
     * Executes the query and returns the IDs of the resulting elements.
     *
     * @param Connection $db The database connection used to generate the SQL statement.
     *                       If this parameter is not given, the `db` application component will be used.
     *
     * @return int[] The resulting element IDs. An empty array is returned if no elements are found.
     */
    public function ids($db = null);
}