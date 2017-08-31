<?php

namespace App\Transformers;

use App\TaskList;
use League\Fractal\TransformerAbstract;

class TaskListTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(TaskList $tasklist)
    {
        return [
            'id' => $tasklist->id,
            'name' => $tasklist->name
        ];
    }
}
