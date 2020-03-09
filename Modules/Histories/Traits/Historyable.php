<?php

namespace Modules\Histories\Traits;

/**
 *
 */
use Modules\Histories\Entities\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Modules\Histories\History\ColumnChange;

trait historyable
{

  public static function bootHistoryable()
  {
    static::updated(function (Model $model){
      collect($model->getChangedColumns($model))->each(function ($change) use ($model){
      $model->saveChange($change);
      });
    });
  }


protected function saveChange(ColumnChange $change)
{
  $this->history()->create([
    'changed_column' => $change->column,
    'changed_value_from' => $change->from,
    'changed_value_to' => $change->to,

  ]);
}

protected function getChangedColumns(Model $model)
  {
    return collect(
      array_diff(
        Arr::except($model->getChanges(), $this->ignoreHistoryColumns()),
        $original = $model->getOriginal()
      )
    )
    ->map(function ($change, $column) use ($original) {

       return new ColumnChange($column, Arr::get($original, $column), $change);
        // return [
        //     'column' => $column,
        //     'from' => Arr::get($original, $column),
        //     'to'   => $change,
        // ];

    });
  }

public function history()
  {
    return $this->morphMany(History::class, 'historyable')
            ->latest();
  }

public function ignoreHistoryColumns()
{
  return [
    'updated_at'
  ];
}
}
