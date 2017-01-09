<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\records;

use craft\db\ActiveRecord;
use yii\db\ActiveQueryInterface;

/**
 * Class Volume record.
 *
 * @property int         $id            ID
 * @property int         $fieldLayoutId Field layout ID
 * @property string      $name          Name
 * @property string      $handle        Handle
 * @property string      $type          Type
 * @property bool        $hasUrls       Whether Volume has URLs
 * @property string      $url           URL
 * @property array       $settings      Settings
 * @property string      $sortOrder     Sort order
 * @property FieldLayout $fieldLayout   Field layout
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class Volume extends ActiveRecord
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%volumes}}';
    }

    /**
     * Returns the asset volume’s fieldLayout.
     *
     * @return ActiveQueryInterface The relational query object.
     */
    public function getFieldLayout()
    {
        return $this->hasOne(FieldLayout::class, ['id' => 'fieldLayoutId']);
    }
}