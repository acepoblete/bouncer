<?php

namespace Silber\Bouncer\Database;

use Eloquence\Database\Traits\UUIDModel;
use RamJack\Domain\Admin\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use UUIDModel;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';


    /**
     * Since we are NOT using ints for ids,
     * we have to tell eloquent not to auto increment the id field
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The abilities relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function abilities()
    {
        return $this->belongsToMany(Models::classname(Ability::class), 'role_abilities');
    }

    /**
     * The users relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Models::classname(User::class), 'user_roles');
    }
}
