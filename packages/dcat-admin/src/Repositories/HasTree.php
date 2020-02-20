<?php

namespace Dcat\Admin\Repositories;

trait HasTree
{
    /**
     * @return string
     */
    public function getPrimaryKeyColumn()
    {
        return $this->getKeyName();
    }

    /**
     * @return string
     */
    public function getParentColumn()
    {
        return $this->eloquent()->getParentColumn();
    }

    /**
     * Get title column.
     *
     * @return string
     */
    public function getTitleColumn()
    {
        return $this->eloquent()->getTitleColumn();
    }

    /**
     * Get order column name.
     *
     * @return string
     */
    public function getOrderColumn()
    {
        return $this->eloquent()->getOrderColumn();
    }

    /**
     * Save tree order from a tree like array.
     *
     * @param array $tree
     * @param int   $parentId
     */
    public function saveOrder($tree = [], $parentId = 0)
    {
        $this->eloquent()->saveOrder($tree, $parentId);
    }

    /**
     * Set query callback to model.
     *
     * @param \Closure|null $query
     *
     * @return $this
     */
    public function withQuery($queryCallback)
    {
        $this->eloquent()->withQuery($queryCallback);

        return $this;
    }

    /**
     * Format data to tree like array.
     *
     * @return array
     */
    public function toTree()
    {
        return $this->eloquent()->toTree();
    }
}
