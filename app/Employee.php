<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Employee
 * @package App
 *
 * @property int $id
 * @property string $fio
 * @property float $salary
 * @property string $work_start_at
 *
 * @property-read Employee $childrens
 * @property-read Employee $boss
 *
 */
class Employee extends Model
{
    use Sortable;

    public $sortable = [
        'fio',
        'salary',
        'work_start_at',
        'position',
        'boss.fio',
    ];

    protected $fillable = [
        'fio',
        'salary',
        'work_start_at',
        'position',
        'boss_id',
        'avatar',
        'thubnaill'
    ];

    /**
     * Отримуємо дітей(підлеглих)
     *
     * @return HasMany|Employee
     */
    public function childrens()
    {
        return $this->hasMany(self::class, 'boss_id');
    }

    /**
     * Отримуємо батька(начальника)
     *
     * @return BelongsTo|Employee
     */
    public function boss()
    {
        return $this->belongsTo(self::class, 'boss_id');
    }
}
