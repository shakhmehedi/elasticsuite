<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Smile ElasticSuite to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile\ElasticsuiteCore
 * @author    Aurelien FOUCRET <aurelien.foucret@smile.fr>
 * @copyright 2018 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Smile\ElasticsuiteCore\Search\Request\Aggregation\Bucket;

use Smile\ElasticsuiteCore\Search\Request\BucketInterface;
use Magento\Framework\Search\Request\Aggregation\Metric;
use Smile\ElasticsuiteCore\Search\Request\QueryInterface;

/**
 * Abstract bucket implementation.
 * @category  Smile
 * @package   Smile\ElasticsuiteCore
 * @author    Aurelien FOUCRET <aurelien.foucret@smile.fr>
 */
abstract class AbstractBucket implements BucketInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $field;

    /**
     * @var Metric[]
     */
    private $metrics;

    /**
     * @var Metric[]
     */
    private $childBuckets;

    /**
     * @var string
     */
    private $nestedPath;

    /**
     * @var QueryInterface|null
     */
    private $filter;

    /**
     * @var QueryInterface|null
     */
    private $nestedFilter;

    /**
     * Constructor.
     *
     * @param string            $name         Bucket name.
     * @param string            $field        Bucket field.
     * @param Metric[]          $metrics      Bucket metrics.
     * @param BucketInterface[] $childBuckets Child buckets.
     * @param string            $nestedPath   Nested path for nested bucket.
     * @param QueryInterface    $filter       Bucket filter.
     * @param QueryInterface    $nestedFilter Nested filter for the bucket.
     */
    public function __construct(
        $name,
        $field,
        array $metrics = [],
        array $childBuckets = [],
        $nestedPath = null,
        QueryInterface $filter = null,
        QueryInterface $nestedFilter = null
    ) {
        $this->name         = $name;
        $this->field        = $field;
        $this->metrics      = $metrics;
        $this->childBuckets = $childBuckets;
        $this->nestedPath   = $nestedPath;
        $this->filter       = $filter;
        $this->nestedFilter = $nestedFilter;
    }

    /**
     * {@inheritDoc}
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * {@inheritDoc}
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function isNested()
    {
        return $this->nestedPath !== null;
    }

    /**
     * {@inheritDoc}
     */
    public function getNestedPath()
    {
        return $this->nestedPath;
    }

    /**
     * {@inheritDoc}
     */
    public function getNestedFilter()
    {
        return $this->nestedFilter;
    }


    /**
     * {@inheritDoc}
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * {@inheritDoc}
     */
    public function getChildBuckets()
    {
        return $this->childBuckets;
    }
}
